<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = request('category_id');
        $categoryName = null;

        if($categoryId) {
            $category = Category::find($categoryId);
            $categoryName = ucfirst($category->name);

            $products = $category->allProducts();
        }else{
            $products = Product::take(30)->get();
        }

        return view('product.index', compact('products', 'categoryName'));
    }

    public function search(Request $request)
    {

        $query = $request->input('query');

        $products = Product::where('name','LIKE',"%$query%")->paginate(10);

        return view('product.catalog',compact('products'));
    }

    public function searchbyprice(Request $request)
    {

        $query = $request->input('query');

        $products = Product::where('selling_price','LIKE',"%$query%")->paginate(10);
        $users = DB::table('products')
                ->where('votes', '=', 100)
                ->where('age', '>', 35)
                ->get();

        return view('product.catalog',compact('products'));
    }

    public function show(Product $product)
    {
        $products = Product::where('id','LIKE',$product->id)->get();
        return view('product.show', compact('products'));

    }


}
