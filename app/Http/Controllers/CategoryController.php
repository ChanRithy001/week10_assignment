<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $allcategories=CategoryModel::all();
        return view('category.index',compact('allcategories'));
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required|unique:category,category_name',
         ]);
        $category = $request->all();
        $getall =new CategoryModel();
        $getall->category_name = $request->category_name;
        $getall->user_id = Auth::id();
        $getall->save();
        return self::index();
    }

    public function delete($id)
    {
        $allcategory=CategoryModel::find($id);
        $allcategory->delete();
        return self::index();
    }
}
