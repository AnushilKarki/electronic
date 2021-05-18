<?php

namespace App\Http\Controllers;
use App\Models\Complain;

use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public $msg;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request)
    {
        $complain = new Complain;
        $complain->user_id = auth()->id();
        $complain->product_id = 1;
        $complain->shop_id = 1;
       $msg="hep";
        $complain->title =  $request->input('title');
        $com =  $request->input('complain');
        $collection=collect([$msg,$com]);
        $collection->implode('-');
        // $comp=implode(array($msg,$com));
        $complain->complain = $collection;

        $complain->save();
        dd('success',$collection);
    }
    public function open()
    {
       
        return view('complain.add');
    }
}
