<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
class HomeController extends Controller
{
    //
    public function getHome(){
        $data['numberProd'] = Product::count();
        $data['numberCate'] = Category::count();
        $data['numberComm'] = Comment::count();
        $data['numberAdmin'] = User::count();
        return view('backend.index', $data);
    }

    public function getLogout(){

        Auth::logout();
        return redirect()->intended('login');
    }

}
