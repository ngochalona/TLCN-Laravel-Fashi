<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Banners;
use App\Category;
use App\Product;
use App\BillsDetails;
use App\Blog;

class IndexController extends Controller
{

    function __construct()
    {
        View::composer(['*'], function ($view) {
            $categoriess = Category::where(['isDelete' => 0, 'status' => 1])->get();
            View::share('categoriess',$categoriess);
        });

    }

    public function index()
    {
        $banners = Banners::where('isDelete', 0)->where('status',1)->get();
        $newProducts = Product::where('isDelete', 0)->where(['status' => 1, 'new' => 1])->get();
        $countNew = Product::where('isDelete', 0)->where(['status' => 1, 'new' => 1])->count();
        $hotProducts = Product::where('isDelete', 0)->where(['status' => 1, 'hot' => 1])->get();
        $countHot = Product::where('isDelete', 0)->where(['status' => 1, 'hot' => 1])->count();
        $products = Product::where('isDelete', 0)->where(['status' => 1])->get();
        $best_seller = BillsDetails::query()->join('products', 'bills_details.product_id', '=', 'products.id')
                    ->select('bills_details.product_id', 'products.image', 'products.name', 'products.id')
                    ->selectRaw('count(bills_details.bill_id) as product_number')
                    ->groupBy('bills_details.product_id', 'products.image', 'products.name', 'products.id')
                    ->orderBy('product_number', 'desc')
                    ->get();
        $blog = Blog::where('isDelete', 0)->where(['status' => 1])->get();

        return view('fashi.index',compact('banners','newProducts','hotProducts', 'products','countNew','countHot','blog','best_seller'));
    }

    public function categories($id=null)
    {
        $products = Product::where('isDelete', 0)->where(['status' => 1, 'category_id' => $id])->paginate(6);
        $category_name = Category::where(['id' => $id])->first();
        return view('fashi.category',compact('products', 'category_name'));
    }
    public function home()
    {
        $banners = Banners::where('isDelete', 0)->where('status',1)->get();
        $newProducts = Product::where('isDelete', 0)->where(['status' => 1, 'new' => 1])->get();
        $countNew = Product::where('isDelete', 0)->where(['status' => 1, 'new' => 1])->count();
        $hotProducts = Product::where('isDelete', 0)->where(['status' => 1, 'hot' => 1])->get();
        $countHot = Product::where('isDelete', 0)->where(['status' => 1, 'hot' => 1])->count();
        $products = Product::where('isDelete', 0)->where(['status' => 1])->get();
        $best_seller = BillsDetails::query()->join('products', 'bills_details.product_id', '=', 'products.id')
                    ->select('bills_details.product_id', 'products.image', 'products.name', 'products.id')
                    ->selectRaw('count(bills_details.bill_id) as product_number')
                    ->groupBy('bills_details.product_id', 'products.image', 'products.name', 'products.id')
                    ->orderBy('product_number', 'desc')
                    ->get();
        $blog = Blog::where('isDelete', 0)->where(['status' => 1])->get();

        return view('fashi.index',compact('banners','newProducts','hotProducts', 'products','countNew','countHot','blog','best_seller'));
    }

    public function contact()
    {
        return view('fashi.contact');
    }

    public function about()
    {
        return view('fashi.about');
    }

    // ajax show product
    public function showProductByCate($id)
    {
        if($id == 0)
            $products = Product::where('isDelete', 0)->where(['status' => 1])->get();
        else
            $products = Product::where('isDelete', 0)->where(['status' => 1, 'category_id' => $id])->get();
        echo $products;
    }

}
