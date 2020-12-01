<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Banners;
use App\Category;
use App\Product;

class IndexController extends Controller
{

    function __construct()
    {
        View::composer(['*'], function ($view) {
            $categoriess = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();
            View::share('categoriess',$categoriess);
        });

    }

    public function index()
    {
        $banners = Banners::where('isDelete', 0)->where('status',1)->get();
        $countBanners = Banners::where('isDelete', 0)->where('status',1)->count();

        $newProducts = Product::where('isDelete', 0)->where(['status' => 1, 'new' => 1])->paginate(4);
        $hotProducts = Product::where('isDelete', 0)->where(['status' => 1, 'hot' => 1])->paginate(4);

        $categories = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();


        return view('fashi.index',compact('banners','newProducts','hotProducts','countBanners','categories'));
    }

    public function subcategories($id=null)
    {
        $categories = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();
        // lay ra tat ca san pham cua 1 loai category
        $products = Product::where('isDelete', 0)->where(['status'=>1,'category_id' => $id])->get();
        $category_name = Category::where(['id' => $id])->first();

        return view('fashi.subcategory',compact('products', 'categories', 'category_name'));
    }

    public function categories($id=null)
    {
        $categories = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();
        // lay ra tat ca san pham cua 1 loai category

        $subcats = Category::where('isDelete', 0)->where(['status'=>1,'parent_id' => $id])->get();

        $category_name = Category::where(['id' => $id])->first();
        return view('fashi.category',compact('categories', 'subcats', 'category_name'));
    }
    public function home()
    {
        $banners = Banners::where('isDelete', 0)->where('status',1)->get();
        $countBanners = Banners::where('isDelete', 0)->where('status',1)->count();

        $newProducts = Product::where('isDelete', 0)->where(['status' => 1, 'new' => 1])->paginate(4);
        $hotProducts = Product::where('isDelete', 0)->where(['status' => 1, 'hot' => 1])->paginate(4);

        $categories = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();


        return view('fashi.index',compact('banners','newProducts','hotProducts','countBanners','categories'));
    }

    public function contact()
    {
        return view('fashi.contact');
    }

    public function about()
    {
        return view('fashi.about');
    }



}
