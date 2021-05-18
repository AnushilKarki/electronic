<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
         $this->middleware('web');
    }
    public function store(Request $request)
    {
       
            $stock=new Stock;
            $color = collect(['name', 'age']);
            $color->toArray();
            $size = collect(['name', 'age']);
            $size->toArray();
            $quantity = collect(['name', 'age']);
            $quantity->toArray();
            $stock->color = $request->input('color');
            $stock->size = $request->input('size');
            $stock->quantity = $request->input('quantity');
            $stock->save();

    //         $color=$request->input('color');

    //         $order->order_number=uniqid('OrderNumber-');
           
    //         $order->shipping_fullname = $request->input('shipping_fullname');
    //         $order->shipping_state = $request->input('shipping_state');
    //         $order->shipping_city = $request->input('shipping_city');
    //         $order->shipping_address = $request->input('shipping_address');
    //         $order->shipping_phone = $request->input('shipping_phone');
    //         $order->shipping_zipcode = $request->input('shipping_zipcode');
           
        
    //         $order->grand_total=\Cart::session(auth()->id())->getTotal();
    //         $order->item_count=\Cart::session(auth()->id())->getContent()->count();
    
    //         $order->user_id = auth()->id();
    //         $order->status='pending';
          
          
    // if (request('payment_method') == 'paypal') {
    //     $order->payment_method = 'card';
    // }
    // elseif(request('payment_method')=='cash_on_delivery'){
    //     $order->payment_method='cash_on_delivery';
    // }
    // else
    // {
    //     $order->payment_method='mobile_wallet';
    // }
           
             
    }
}
