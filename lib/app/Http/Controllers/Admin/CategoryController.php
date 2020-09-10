<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category', $data);
    }
    public function postCate(AddCateRequest $request){
        $category = new Category();
        $category->cate_name = $request->tendanhmuc;
        $category->cate_slug = Str::slug($request->tendanhmuc);
        $category->save();
        return back();
    }

    public function getEditCate($id){
        $data['cate'] = Category::find($id);
        return view('backend.editcategory', $data);
    }
    public function postEditCate(EditCateRequest $request ,$id){
        $category = Category::find($id);
        $category->cate_name = $request->editname;
        $category->cate_slug = Str::slug($request->editname);
        $category->save();
        return redirect()->intended('admin/category');
    }


    public function getDeleteCate($id){
        Category::destroy($id);
        return back();
    }
}
