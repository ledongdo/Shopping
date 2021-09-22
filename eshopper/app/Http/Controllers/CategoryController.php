<?php

namespace App\Http\Controllers;
use App\category;
use App\product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug,$categoryId)
    {
        $categorysLimit = category::where('parent_id',0)->take(3)->get();
        $categorys = category::where('parent_id',0)->get();
        $products = product::where('category_id',$categoryId)->paginate(12); 
        return view('product.category.list',compact('categorysLimit','products','categorys'));
    }
}
