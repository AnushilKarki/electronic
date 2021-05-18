<?php

namespace App\Http\Controllers;
use App\Models\Order;
use PDF;
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
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //
            $request->validate([
                'shipping_fullname' => 'required',
                'shipping_state' => 'required',
                'shipping_city' => 'required',
                'shipping_address' => 'required',
                'shipping_phone' => 'required',
               'payment_method' =>'required'
                ]);
                $order=new Order;
                $order->order_number=uniqid('OrderNumber-');
               
                $order->shipping_fullname = $request->input('shipping_fullname');
                $order->shipping_state = $request->input('shipping_state');
                $order->shipping_city = $request->input('shipping_city');
                $order->shipping_address = $request->input('shipping_address');
                $order->shipping_phone = $request->input('shipping_phone');
                $order->shipping_zipcode = $request->input('shipping_zipcode');
        
                if(!$request->has('billing_fullname'))
                {
                    $order->billing_fullname = $request->input('shipping_fullname');
                    $order->billing_state = $request->input('shipping_state');
                    $order->billing_city = $request->input('shipping_city');
                    $order->billing_address = $request->input('shipping_address');
                    $order->billing_phone = $request->input('shipping_phone');
                    $order->billing_zipcode = $request->input('shipping_zipcode');
                }
                else{
                    $order->billing_fullname = $request->input('billing_fullname');
                    $order->billing_state = $request->input('billing_state');
                    $order->billing_city = $request->input('billing_city');
                    $order->billing_address = $request->input('billing_address');
                    $order->billing_phone = $request->input('billing_phone');
                    $order->billing_zipcode = $request->input('billing_zipcode');
                }
               
            
                $order->grand_total=\Cart::session(auth()->id())->getTotal();
                $order->item_count=\Cart::session(auth()->id())->getContent()->count();
        
                $order->user_id = auth()->id();
                $order->status='pending';
              
              
        if (request('payment_method') == 'paypal') {
            $order->payment_method = 'card';
        }
        elseif(request('payment_method')=='cash_on_delivery'){
            $order->payment_method='cash_on_delivery';
        }
        else
        {
            $order->payment_method='mobile_wallet';
        }
                $order->save();
            
                $carttotal=\Cart::session(auth()->id())->getTotal();
                $cartitems= \Cart::session(auth()->id())->getContent();
                foreach($cartitems as $item)
                {
                    $order->item()->attach($item->id,[
                        'price' => $item->price,
                        'quantity'=>$item->quantity
                    ]);
      
                }
        
                //paypal
             
                //payment option
        
               
                if(request('payment_method')=='paypal'){
                    return redirect()->route('paypal.checkout',$order->id);
                }
                \Cart::session(auth()->id())->clear();
                //invoice pdf
                // $pdf = PDF::loadView('pdf.invoice',['cartitems'=>$cartitems]);
                // $pdf->setOrientation('landscape');
                // return $pdf->stream('invoice.pdf');
                return redirect()->route('home')->withMessage('Order has been placed');
                $pdf = PDF::loadView('pdf.invoice',['cartitems'=>$cartitems,'carttotal'=>$carttotal]);
      
                return $pdf->download('invoice.pdf');
                // $pdf = PDF::loadView('pdf.invoice',['cartitems'=>$cartitems]);
                // return $pdf->stream('invoice.pdf');
                // //empty the cart

                
                //sent email to customer
        
                 //thank user for ordering        
                
                 
          
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
