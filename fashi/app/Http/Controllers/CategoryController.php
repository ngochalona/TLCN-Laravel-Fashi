<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->url = $data['category_url'];
            $category->description = $data['category_description'];
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','Category has been added successfully');
        }
        return view('admin.category.add_category');
    }

    public function viewCategories()
    {
        $categories = Category::where('isDelete', 0)->get();
        return view('admin.category.view_category',compact('categories'));
    }

    public function editCategory(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'], 'description'=>$data['category_description'],
            'url'=>$data['category_url']]);

            return redirect('/admin/view-categories')->with('flash_message_success','Category has been updated ');
        }

        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.category.edit_category', compact('categoryDetails'));
    }

    public function updateStatus($id=null)
    {

        $data = Category::where('id', $id)->first();;
        $curentStatus = $data['status'];

        if($curentStatus == 1)
        {
            Category::where('id', $id)->update(['status' => 0]);
            echo "Hiện";
        }
        if($curentStatus == 0)
        {
            Category::where('id', $id)->update(['status' => 1]);
            echo "Ẩn";
        }

    }

    public function deleteCategory($id = null)
    {
        Category::where('id', $id)->update(['isDelete' => 1]);
        Alert::success('Deleted','Success Message');
        return redirect()->back();
    }

    // Mở trang khôi phục dữ liệu đã xóa
    public function viewRestoreCategory()
    {
        $categories = Category::where('isDelete', 1)->get();
        return view('admin.category.delete_category',compact('categories'));
    }

    // Khôi phục dữ liệu đã xóa
    public function restoreStatus($id=null)
    {
        Category::where('id', $id)->update(['isDelete' => 0]);
        echo "Unactive";
    }
}
