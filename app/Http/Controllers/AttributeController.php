<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
    {
        $products = Product::take(3)->get();
        return view('attribute.index',compact('products'));
    }
    public function add($product)
    {
        $products = Product::where('id','LIKE',$product)->get();
        return view('attribute.add',compact('products'));
    }
    public function store1(Request $request)
    {
        $attribute = new Stock;
        $productid =  $request->input('productid');
        $attribute->product_id = $productid;

        $color1 =  $request->input('color1');
        $size1 = $request->input('size1');
        $quantity1 = $request->input('quantity1');

        $color2 =  $request->input('color2');
        $size2 = $request->input('size2');
        $quantity2 = $request->input('quantity2');

        $color3 =  $request->input('color3');
        $size3 = $request->input('size3');
        $quantity3 = $request->input('quantity3');

        $color4 =  $request->input('color4');
        $size4 = $request->input('size4');
        $quantity4 = $request->input('quantity4');

        $color5 =  $request->input('color5');
        $size5 = $request->input('size5');
        $quantity5 = $request->input('quantity5');

        $color=collect([$color1,$color2,$color3,$color4,$color5]);
        $color->implode('-');

        $size=collect([$size1,$size2,$size3,$size4,$size5]);
        $size->implode('-');

        $quantity=collect([$quantity1,$quantity2,$quantity3,$quantity4,$quantity5]);
        $quantity->implode('-');

        $attribute->color = $color;
        $attribute->size = $size;
        $attribute->quantity = $quantity;

      
        $attribute->save();
        return redirect()->route('home');
    }
}
