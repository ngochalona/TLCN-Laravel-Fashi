<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;// package intervention image
use App\Product;
use App\Category;
use App\ProductsAttributes;
use App\Rating;
use App\User;
use App\BillsDetails;
use App\Import;
use App\ImportDetails;
use App\Imports\ProductsImportFile;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Auth;
use View;



class ProductController extends Controller
{
    function __construct()
    {
        View::composer(['*'], function ($view) {
            $categoriess = Category::where(['isDelete' => 0, 'status' => 1])->get();
            View::share('categoriess',$categoriess);
        });

    }
    // Admin add product
    public function addProduct(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->name = $data['product_name'];
            $product->code = $data['product_code'];
            if(!empty($data['product_description']))
            {
                $product->description = $data['product_description'];
            }
            else
            {
                $product->description = '';
            }
            $product->price = $data['product_price'];
            $product->discounted_price = $data['product_price'];

            //upload image
            if($request->hasFile('image'))  //nếu có file hình
            {
                $img_tmp = Input::file('image');
                if($img_tmp->isValid())
                {
                    //image path code
                    $extension = $img_tmp->getClientOriginalExtension();//lay ten phan mo rong hinh
                    $filename = rand(111,99999) . '.' . $extension; // ten hinh moi + phan mo rong
                    $img_path = 'uploads/products/'.$filename;  //tao duong dan luu hinh

                    //image resize and lưu vào dường dẫn thư mục hình
                    Image::make($img_tmp)->resize(500,500)->save($img_path);

                    $product->image = $filename;//lưu tên hình xuống csdl
                }

            }
            $product->save();
            return redirect('/admin/view-products')->with('flash_message_success','Product has been added successfully');
        }


        // category dropdown menu
        $category = Category::where('isDelete', 0)->where(['status' => 1])->get();
        $category_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($category as $cat)
        {
            // đưa category cha vào option
            $category_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
        }
        return view('admin.products.add_product', compact('category_dropdown'));
    }

    // Admin view products
    public function viewProducts()
    {
        $products = Product::where('isDelete', 0)->get();
        return view('admin.products.view_products',compact('products'));
    }

    // Admin edit products
    public function editProduct(Request $request, $id=null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //upload image
            if($request->hasFile('image'))  //nếu như có chọn hình mới
            {
                $img_tmp = Input::file('image'); // lấy hình đó ra
                if($img_tmp->isValid())
                {
                    //image path code
                    $extension = $img_tmp->getClientOriginalExtension(); // lấy đuôi hình
                    $filename = rand(111,99999) . '.' . $extension;  // đặt tên hình
                    $img_path = 'uploads/products/'.$filename;  //tạo đường dẫn lưu hình

                    //image resize and lưu vào dường dẫn thư mục hình
                    Image::make($img_tmp)->resize(500,500)->save($img_path);

                }


            }
            else// k chọn hình mới
            {
                $filename = $data['current_image'];// lấy lại hình cũ
            }

            if(empty($data['product_description']))
            {
                $data['product_description'] = '';
            }

            Product::where(['id'=>$id])->update(['name'=>$data['product_name'],
            'code'=>$data['product_code'], 'description'=>$data['product_description'],
            'price'=>$data['product_price'],'discounted_price'=>$data['product_price'],'image'=>$filename]);

            return redirect('/admin/view-products')->with('flash_message_success','Product has been updated ');
        }

        //lay ra 1 row
        $productDetails = Product::where('isDelete', 0)->where(['id'=>$id])->first();

        return view('admin.products.edit_product', compact('productDetails'));
    }

    // Admin delete products
    public function deleteProduct($id=null)
    {
        Product::where('id', $id)->update(['isDelete' => 1]);
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->back();
    }

    // Admin update status product
    public function updateStatus($id=null)
    {
        $data = Product::where('id', $id)->first();;
        $curentStatus = $data['status'];


        if($curentStatus == 1)
        {
            Product::where('id', $id)->update(['status' => 0]);
            echo "Hiện";
        }
        if($curentStatus == 0)
        {
            Product::where('id', $id)->update(['status' => 1]);
            echo "Ẩn";
        }
    }

    // Admin update hot product
    public function updateHot($id=null)
    {
        $data = Product::where('id', $id)->first();;
        $curentStatus = $data['hot'];


        if($curentStatus == 1)
        {
            Product::where('id', $id)->update(['hot' => 0]);
            echo "Hiện";
        }
        if($curentStatus == 0)
        {
            Product::where('id', $id)->update(['hot' => 1]);
            echo "Ẩn";
        }
    }

    // // Admin update new product
    public function updateNew($id=null)
    {
        $data = Product::where('id', $id)->first();;
        $curentStatus = $data['new'];


        if($curentStatus == 1)
        {
            Product::where('id', $id)->update(['new' => 0]);
            echo "Hiện";
        }
        if($curentStatus == 0)
        {
            Product::where('id', $id)->update(['new' => 1]);
            echo "Ẩn";
        }
    }

    // Admin add product attribute
    public function addAttributes(Request $request, $id = null)
    {
        //$productDetails = Product::where(['id'=>$id])->first();
        $productDetails = Product::where('isDelete', 0)->with('attributes')->where('id',$id)->first();
        if($request->isMethod('post'))
        {
            $data = $request->all();
           // for theo từng item trong mảng sku[]
            foreach($data['sku'] as $key => $val)
            {
                if(!empty($val))
                {
                    //prevent duplicate SKU record, sku là unique
                    $attrCountSKU = ProductsAttributes::where('sku',$val)->count();
                    if($attrCountSKU > 0)
                    {
                        return redirect('/admin/add-attributes/'.$id)->with('flash_message_error','SKU is already exists, please select another sku ');
                    }
                    //prevent duplicate size record                                                        key = 0 1 2 3
                    $attrCountSizes = ProductsAttributes::where(['product_id'=>$id, 'size' => $data['size'][$key]])->count();
                    if($attrCountSizes > 0)
                    {
                        return redirect('/admin/add-attributes/'.$id)->with('flash_message_error',''.$data['size'][$key].' Size is already exists, please select another size');
                    }
                    $attribute = new ProductsAttributes;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }

            }
            return redirect('/admin/add-attributes/'.$id)->with('flash_message_success','Products Attributes added successfully');
        }
        return view('admin.products.add_attributes',compact('productDetails'));
    }

    // Admin delete product attribute
    public function deleteAttributes($id=null)
    {
        ProductsAttributes::where('id',$id)->delete();
        Alert::success('Deleted','Success Message');
        return redirect()->back();
    }

    // Admin edit product attribute
    public function editAttributes(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // for từng dòng trong mảng attr[] , mỗi dòng là 1 loại attr
            foreach($data['attr'] as $key=>$val)
            {
                //update theo từng dòng
                ProductsAttributes::where(['id'=>$val])->update(['sku'=>$data['sku'][$key],
                'size'=>$data['size'][$key],  'stock'=>$data['stock'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Products Attributes updated successfully');
        }
    }

    //
    public function getStock(Request $request)
    {
        $data = $request->all();
        $proArr = explode("-",$data['idSize']);
        $proAtrr = ProductsAttributes::where(['product_id' => $proArr[0],'size' => $proArr[1]])->first();
        echo $proAtrr->stock;
    }

    // Mở trang khôi phục dữ liệu đã xóa
    public function viewRestoreProduct()
    {
        $products = Product::where('isDelete', 1)->get();
        return view('admin.products.delete_products',compact('products'));
    }

    // Khôi phục dữ liệu
    public function restoreStatus($id=null)
    {
        Product::where('id', $id)->update(['isDelete' => 0]);
        echo "Unactive";
    }

    // Hiện trang chỉnh sửa giá giảm
    public function viewDiscountedPrice()
    {
        $products = Product::where('isDelete', 0)->get();
        return view('admin.products.discounted_price',compact('products'));
    }

    // Cập nhật giá giảm
    // Khôi phục dữ liệu
    public function discountedPrice($id=null, $disPrice)
    {
        Product::where('id', $id)->update(['discounted_price' => $disPrice]);
        echo $disPrice;
    }

    // Elasticsearch
    public function elasticSearch(Request $request)
    {
    	if($request->has('search')){
    		$items = Product::searchByQuery(['match' => ['name' => $request->search]]);
            // dd($items->getHits()["hits"]);
    	}
        $tukhoa = $request->search;
        return view('fashi.products.timkiem',['products'=>$items->getHits()["hits"], 'tukhoa'=>$tukhoa]);
    }

    // Make index for elasticsearch
    public function makeIndexData(Request $request){
        Product::with('attributes')->chunk(20,function($products){
            foreach($products as $key=> $product){
                $product->addToIndex();
            }
        });
        return response()->json("222",200);
    }

    // rating
    public function rating($name, $star) {
        $user_id = Auth::user()->id;
        $exist = Rating::where(['user_id' => $user_id, 'product_name' => $name])->first();
        if(!isset($exist)){
            Rating::create([
                'user_id' => $user_id,
                'product_name' => $name,
                'rating' => (int)$star
            ]);
        } else{
            Rating::where(['user_id' => $user_id, 'product_name' => $name])->update(['rating'=>$star]);
        }
    }

    // recommend products
    function getRecommend(){
        $products = Rating::all();
        $matrix = array();
        foreach($products as $product){
            $username = User::where(['id' => $product->user_id])->get();
            $matrix[$username[0]->name][$product->product_name] = $product->rating;
        }

        $res = self::getRecommendation($matrix, Auth::user()->name);
        return $res;
    }

    function getSimilarity($matrix, $person1, $person2)
    {
        $similar = array();
        $sum = 0;
        foreach ($matrix[$person1] as $key => $value) {
            if (array_key_exists($key, $matrix[$person2])) {
                $similar[$key] = 1;
            }
        }
        if($similar == 0)
            return 0;

        foreach ($matrix[$person1] as $key => $value) {
            if(array_key_exists($key, $matrix[$person2]))
            {
                $sum = $sum + pow($value - $matrix[$person2][$key], 2);
            }
        }

        return 1/(1+sqrt($sum));
    }

    function getRecommendation($matrix, $person)
    {
        $total = array();
        $simsums = array();
        $ranks = array();
        foreach ($matrix as $otherPerson => $value) {
            if ($otherPerson != $person) {
                $sim = self::getSimilarity($matrix, $person, $otherPerson);

                // "Độ gần giống : " . $otherPerson . " với " . $user . " là : " . $sim . "<br/>";
                // if ($sim == -1) continue;
                foreach ($matrix[$otherPerson] as $key => $value) {
                    if (!array_key_exists($key, $matrix[$person])) {
                        if (!array_key_exists($key, $total)) {
                            $total[$key] = 0;
                        }
                        $total[$key] += $matrix[$otherPerson][$key] * $sim;

                        if (!array_key_exists($key, $simsums)) {
                            $simsums[$key] = 0;
                        }
                        $simsums[$key] += $sim;
                    }
                }
            }
        }

        foreach ($total as $key => $value) {
            $ranks[$key] = $value / $simsums[$key];

        }
        array_multisort($ranks, SORT_DESC);
        return $ranks;

    }

    // Product detail client
    public function products($id=null)
    {
        $res = [];
        $productDetails = Product::where('isDelete', 0)->with('attributes')->where('id',$id)->first();
        $category_id = $productDetails->category_id;
        $relatedProducts = Product::where('isDelete', 0)->where(['status' => 1, 'category_id' => $category_id])->limit(4)->get();
        if(Auth::check()){
            $res = self::getRecommend();
        }
        $rating = DB::table('ratings')
        ->where('product_name', $productDetails->name)
        ->avg('rating');
        // $arr = array();
        // foreach($res as $key => $value){
        //     array_push($arr, $key);
        // }
        // $pros = DB::table('products')
        //           ->whereIn('name', $arr)
        //           ->get();
        //           dd($pros);
        $best_seller = BillsDetails::query()->join('products', 'bills_details.product_id', '=', 'products.id')
                    ->select('bills_details.product_id', 'products.image', 'products.name', 'products.id')
                    ->selectRaw('count(bills_details.bill_id) as product_number')
                    ->groupBy('bills_details.product_id', 'products.image', 'products.name', 'products.id')
                    ->orderBy('product_number', 'desc')
                    ->get();
        return view('fashi.product_details', compact('productDetails','relatedProducts', 'res', 'rating', 'best_seller'));
    }


    // Show Nhap hang
    public function import(){
        $import = Import::all();
        return view('admin.products.show_imports', compact('import'));
    }

    // Chi tiết nhập hàng
    public function importDetail($id)
    {
        $details = ImportDetails::where(['import_id' => $id])->get();
        return view('admin.products.chitietnhaphang', compact('details','id'));
    }

    // Nhap hang
    public function nhapHang(Request $request){
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $sl = 0;
            foreach($data['sanpham'] as $key => $val){
                $sl += $data['soluong'][$key];
            }
            if(!empty($val))
            {
                $import = new Import;
                $import->total_qty = $sl;
                $import->save();

                $import_id = DB::getPdo()->lastinsertID();
                foreach($data['sanpham'] as $key => $val){
                    $importd = new ImportDetails;
                    $importd->import_id = $import_id;
                    $importd->product_id = $data['sanpham'][$key];
                    $importd->size = $data['size'][$key];
                    $importd->quantity = $data['soluong'][$key];
                    $importd->save();

                    $stock = DB::table('products_attributes')->where(['product_id'=>$data['sanpham'][$key], 'size' => $data['size'][$key]])->select('stock')->first();
                    ProductsAttributes::where(['product_id'=>$data['sanpham'][$key], 'size' => $data['size'][$key]])->update(['stock' => $stock->stock + $data['soluong'][$key]]);
                }
            }

            return redirect()->back()->with('flash_message_success','Products imported successfully');
        }

        $products = Product::where('isDelete', 0)->get();
        return view('admin.products.nhaphang', compact('products'));
    }

    // Nhap hang file
    public function importFile()
    {
        if(!request()->hasFile('file')){
            return redirect()->back()->with('flash_message_error','You did not choose file');
        }
        Excel::import(new ProductsImportFile, request()->file('file'));
        return redirect()->back()->with('flash_message_success','Products imported successfully');
    }


    // GEt Size
    public function getSize($id)
    {
        $sizes = ProductsAttributes::where('product_id',$id)->select('size')->get();
        echo $sizes;
    }
}






































