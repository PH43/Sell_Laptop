<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\AddProductRequest;
//use App\Http\Requests\EditCateRequest;
//use Illuminate\Support\Str;
//use Auth;
use DB;

class ProductController extends Controller
{
    public function getProduct(){   
        $data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product',$data);
    }
    public function getAddProduct(){
        $data['catelist'] = Category::all();
        return view('backend.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request){
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_img = $filename;
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->save();
        $product->img->storeAs('avatar',$filename);
        return back();
    }
    public function getEditProduct(){
        return view('backend.editproduct');
    }
    public function postEditProduct(){

    }
    public function getDeleteProduct(){

    }
}
