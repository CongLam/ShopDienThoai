<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;
class CartController extends Controller
{
    public function getAddCart($id){
        //dd($id);

        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->product_name, 'qty' => 1, 'price' => $product->product_price, 'options' => ['img' => $product->product_img]]);
        return redirect('cart/show');


        //  $data = Cart::content();
        //  dd(Cart::content());
    }

    public function getShowCart(){
        $data['cartItems'] = Cart::content();
        $data['totalPrice'] = Cart::total();
        return view('frontend.cart', $data);
    }

    public function getDeleteCart($rowid){
        if($rowid=="all"){
            //dd("Xoa het");
            Cart::destroy();
        }
        else{
            //dd("Xoa don");
            Cart::remove($rowid);
        }
        return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
    }

    public function postComplete(Request $request){
        $data['info'] = $request->all();
        $email = $request->email;
        $data['cart'] = Cart::content();
        $data['totalPrice'] = Cart::total();
        //dd($data);
        Mail::send('frontend.email', $data, function ($message) use ($email) {
            $message->from('lamtuancong2807@gmail.com', 'CongLam'); //admin

            $message->to($email, $email); //khach hang

            $message->cc('conglt2807@gmail.com', 'CongLamShop'); //chu cua hang

            $message->subject('Xác nhận hóa đơn mua hàng CongLamShop');
        });
        Cart::destroy();
        return redirect('complete');
    }

    public function getComplete(){
        return view('frontend.complete');
    }

}
