<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmationMail;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $braintree = config('braintree');
        $clientToken = $braintree->clientToken()->generate();
        
        return response()->json([
            'response' => true,
            'clientToken' => $clientToken
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|max:50',
            'userSurname' => 'required|string|max:50',
            'userAddress' => 'required|string|max:50',
            'userPhone' => 'required|string|max:20',
            'userEmail' => 'required|email',
        ]);    

        $data = $request->all();
        $braintree = config('braintree');
        $nonce = $request->payment_method_nonce;

        $plates = json_decode(request('cart_items'));
        $total = 0;
        $restaurantId = '';
        $order_list = '';
        date_default_timezone_set('Europe/Rome');
        $myTime = new DateTime();
        foreach ($plates as $plate) {
            $total += (($plate->price * $plate->quantity) - (($plate->price * $plate->discount / 100) * $plate->quantity));
            $restaurantId = $plate->user_id;
            $order_list = $order_list . $plate->name . ' x' . $plate->quantity . ", ";
        }
        $amount = $total;
        $result = $braintree->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
        ]);
        if ($result->success) {
            $newOrder = new Order();
            $newOrder->first_name = $request->userName;
            $newOrder->last_name = $request->userSurname;
            $newOrder->address = $request->userAddress;
            $newOrder->phone = $request->userPhone;
            $newOrder->email = $request->userEmail;
            $newOrder->total_price = $amount;
            $newOrder->user_id = $restaurantId;
            $newOrder->order_list = $order_list;
            $newOrder->order_date = $myTime;
            $newOrder->save();

            // return response()->json([
            //     'response' => true,
            //     'transaction' => $result->transaction
            // ]);

            $userData = [
                'name' => $request->userName,
                'surname' => $request->userSurname,
                'address' => $request->userAddress,
                'email' => $request->userEmail,
                'order'=>$order_list,
                'amount' => $total
            ];
            
            Mail::to($request->userEmail)->send(new OrderConfirmationMail($userData));
            
            $user = DB::table('users')->find($restaurantId);
            Mail::to($user->email)->send(new OrderConfirmationMail($userData));    
            return redirect()->route('checkout');
            
        } else {
            // return response()->json([
            //     'response' => false,
            //     'errors' => $result->errors->deepAll(),
            //     'debug' => [$nonce, $amount]
            // ]);
            
            return redirect()->route('checkoutf');

        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
