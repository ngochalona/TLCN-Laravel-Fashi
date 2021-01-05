<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;// package intervention image
use App\Product;
use App\Category;
use App\ProductsAttributes;
use View;


class ProductController extends Controller
{
    function __construct()
    {
        View::composer(['*'], function ($view) {
            $categoriess = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();
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
        // lấy tất cả các caterogy cha
        $category = Category::where('isDelete', 0)->where(['parent_id' => 0])->get();
        $category_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($category as $cat)
        {
            // đưa category cha vào option
            $category_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            //lấy các category con của 1 cha nào đó
            $sub_category = Category::where('isDelete', 0)->where(['parent_id'=>$cat->id])->get();
            foreach($sub_category as $sub_cat)
            {
                // đưa category con vào option
                $category_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";
            }
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

    // Product detail client
    public function products($id=null)
    {
        $productDetails = Product::where('isDelete', 0)->with('attributes')->where('id',$id)->first();
        $product = Product::where(['isDelete' => 0, 'id' => $id])->first();
        $category_id = $product->category_id;
        $relatedProducts = Product::where('isDelete', 0)->where(['status' => 1, 'category_id' => $category_id])->limit(4)->get();

        return view('fashi.product_details', compact('productDetails','relatedProducts'));
    }

    // Client search
    public function timKiem(Request $request)
    {

        $this->validate($request,[
            'tukhoa'=>'max:30',
        ],[
            'tukhoa.max'=>'Maximum of Your key is not over 30 characters',

        ]);

        $categories = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();
        // lay ra tat ca san pham cua 1 loai category

        $tukhoa = $request->tukhoa;
        $products = Product::where('isDelete', 0)->where('name','like',"%$tukhoa%")->paginate(4);
        return view('fashi.products.timkiem', compact('tukhoa', 'products', 'categories'));
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
}
