<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        // $orders = Auth::user()->orders;
        $orders = Order::where('user_id', Auth::user()->id)
                ->orderBy('updated_at', 'desc')
                ->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function stats(){
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('admin.orders.stats', compact('orders'));
    }
}
