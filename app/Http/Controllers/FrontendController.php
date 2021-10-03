<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    public function getHome(){
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        $data['news'] = Product::orderBy('prod_id','desc')->take(8)->get();
        return view('frontend.home',$data);
    }
}
