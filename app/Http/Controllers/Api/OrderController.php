<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data = $request->all();

        $braintree = config('braintree');
        $nonce = $request->nonce;
        $amount = $request->total;
        $result = $braintree->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
        ]);
        if ($result->success) {
            return response()->json([
                'response' => true,
                'transaction' => $result->transaction
            ]);
            
        } else {
            return response()->json([
                'response' => false,
                'errors' => $result->errors->deepAll(),
                'debug' => [$nonce, $amount]
            ]);
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
