<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;
class ProductController extends Controller
{
    public function getProduct(){
        $data['productList'] = DB::table('tbl_products')->join('tbl_categories','tbl_products.product_cate','=','tbl_categories.cate_id')->orderBy('product_id', 'desc')->get();
       // $data['productlist'] = DB::table('vp_product')->join('vp_categories','vp_product.product_cate','=','vp_categories.cate_id')->orderBy('product_id', 'desc')->get();

        return view('backend.product', $data);
    }

    public function getAddProduct(){
        $data['chooseCate'] = Category::all();
        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request){
        $filename = $request->img->getClientOriginalName();

        $product = new Product();
        $product->product_name = $request->name;
        $product->product_slug = Str::slug($request->name);

        $product->product_price = $request->price;
        $product->product_img = $filename;
        $product->product_warranty =  $request->warranty;
        $product->product_accessories =  $request->accessories;
        $product->product_condition=  $request->condition;
        $product->product_promotion =  $request->promotion;
        $product->product_status =  $request->status;
        $product->product_description =  $request->description;
        $product->product_featured =  $request->featured;
        $product->product_cate = $request->cate;

        $product->save();

        $request->img->storeAs('avatar', $filename);

        return redirect('admin/product');
    }

    public function getEditProduct($id){
        $data['productInf'] = Product::find($id);
        $data['cateList'] = Category::all();
        return view('backend.editproduct', $data);
    }

    public function postEditProduct(Request $request, $id){
        $product = new Product();
        $arr['product_name'] = $request->name;
        $arr['product_slug'] = Str::slug($request->name);
        $arr['product_price'] = $request->price;
        $arr['product_warranty'] = $request->warranty;
        $arr['product_accessories'] = $request->accessories;
        $arr['product_condition'] = $request->condition;
        $arr['product_promotion'] = $request->promotion;
        $arr['product_status'] = $request->status;
        $arr['product_description'] = $request->description;
        $arr['product_featured'] = $request->featured;
        $arr['product_cate']=$request->cate;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['product_img'] = $img;
            $request->img->storeAs('avatar'.$img);
        }
        $product::where('product_id',$id)->update($arr);
        return redirect('admin/product');
    }

    public function getDeleteProduct($id){
        Product::destroy($id);
        return back();
    }
}
