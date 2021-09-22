<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = category::where('parent_id',0)->get();
        $products = product::latest()->take(6)->get();
        $productsRecommend = product::latest('view_count','desc')->take(12)->get();
        $categorysLimit = category::where('parent_id',0)->take(3)->get();
        return view('home.home',compact('sliders','categorys','products','productsRecommend','categorysLimit'));
    }
    public function test()
    {
        return view('test');
    }
}
