<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class FrontendController extends Controller
{
    public function getHome(){
        //get san pham dac biet
        $data['featuredProduct'] = Product::where('product_featured', 1)->orderBy('product_id', 'desc')->get();

        //get san pham moi
        $data['newProduct'] = Product::orderBy('product_id', 'desc')->take(8)->get();

        //get danh muc:viet trong AppServiceProvider

        return view('frontend.home', $data);
    }

    public function getDetail($id){
        //get product
        $data['detailProduct'] = Product::find($id);
        //getcomment
        $data['commentsProduct'] = Comment::where('comment_product', $id)->orderBy('created_at', 'desc')->get();

        return view('frontend/details', $data);
    }

    public function getCategory($id){
        $data['cateName'] = Category::find($id);
        $data['productCate'] = Product::where('product_cate', $id)->orderBy('product_id', 'desc')->paginate(8);
        return view('frontend/category', $data);
    }

    public function postComment($id, Request $request){
        $comment = new Comment();
        $comment->comment_email = $request->email;
        $comment->comment_name = $request->name;
        $comment->comment_content = $request->content;
        $comment->comment_product = $id;
        $comment->save();
        return back();
    }

    public function getSearch(Request $request){
        $result = $request->enterKeyword;
        $data['keyword'] = $result;
        $result = str_replace(' ', '%', $result); //thay dau cach bang %
        $data['itemsSeach'] = Product::where('product_name', 'like', '%'.$result.'%')->get();
        return view('frontend.search', $data);
    }

}
