<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;

class OrderController extends Controller
{
    public function getOrders(){
    
        if(Auth::user()->isAdmin){

            $orders = Order::all();
            $orders->transform(function($order, $key){
                $order->cart = unserialize($order->cart);
                return $order;
            });
            return view('/orders', compact('orders'));
        }
        else{
            return redirect()->back();
        }
    }
}
