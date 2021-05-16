<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;// package intervention image
use App\Blog;
use View;
use App\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;


class BlogController extends Controller
{
    function __construct()
    {
        View::composer(['*'], function ($view) {
            $categoriess = Category::where(['isDelete' => 0, 'status' => 1])->get();
            View::share('categoriess',$categoriess);
        });

    }

    // Client Show blog
    public function blog()
    {
        $blogs = Blog::where('isDelete', 0)->where('status', 1)->get();
        return view('fashi.blog', compact('blogs'));
    }

    // Admin view blogs
    public function viewBlogs()
    {
        $blogs = Blog::where('isDelete', 0)->get();
        return view('admin.blog.view_blogs', compact('blogs'));
    }

    // Admin add blogs
    public function addBlog(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $blog = new Blog;
            $blog->title = $data['blog_title'];
            $blog->content = $data['blog_content'];

            //upload image
            if($request->hasFile('image'))  //nếu như có chọn hình mới
            {
                $img_tmp = Input::file('image'); // lấy hình đó ra
                if($img_tmp->isValid())
                {
                    //image path code
                    $extension = $img_tmp->getClientOriginalExtension(); // lấy đuôi hình
                    $filename = rand(111,99999) . '.' . $extension;  // đặt tên hình
                    $img_path = 'uploads/blogs/'.$filename;  //tạo đường dẫn lưu hình

                    //image resize and lưu vào dường dẫn thư mục hình
                    Image::make($img_tmp)->save($img_path);
                    $blog->image = $filename;
                }
            }
            $blog->save();
            return redirect('/admin/view_blogs')->with('flash_message_success','Blog has been created ');
        }
        return view('admin.blog.add_blog');
    }

    // Admin edit blog
    public function editBlog(Request $request, $id = null)
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
                    $img_path = 'uploads/blogs/'.$filename;  //tạo đường dẫn lưu hình

                    //image resize and lưu vào dường dẫn thư mục hình
                    Image::make($img_tmp)->save($img_path);
                }

            }
            else if(!empty($data['current_image']))
            {
                $filename = $data['current_image'];
            }
            else
            {
                $filename = '';
            }
            Blog::where('id',$id)->update(['title'=>$data['blog_title'],
            'content'=>$data['blog_content'], 'image'=>$filename]);

            return redirect('/admin/view_blogs')->with('flash_message_success','Blog has been updated ');

        }

        $blogDetails = Blog::where(['id'=>$id])->first();
        return view('admin.blog.edit_blog', compact('blogDetails'));
    }

    // Admin update status
    public function updateStatus($id=null)
    {
        $data = Blog::where('id', $id)->first();;
        $curentStatus = $data['status'];


        if($curentStatus == 1)
        {
            Blog::where('id', $id)->update(['status' => 0]);
            echo "Hiện";
        }
        if($curentStatus == 0)
        {
            Blog::where('id', $id)->update(['status' => 1]);
            echo "Ẩn";
        }
    }

    // ADmin delete blog
    public function deleteBlog($id = null)
    {
        Blog::where(['id'=>$id])->update(['isDelete' => 1]);
        Alert::success('Deleted', 'Success Message');
        return redirect()->back();
    }

    // Mở trang khôi phục dữ liệu đã xóa
    public function viewRestoreBlog()
    {
        $blogs = Blog::where('isDelete', 1)->get();
        return view('admin.blog.delete_blogs', compact('blogs'));
    }

    // Khôi phục dữ liệu đã xóa
    public function restoreStatus($id=null)
    {
        Blog::where('id', $id)->update(['isDelete' => 0]);
        echo "Unactive";
    }

    public function mail(){
        Mail::to('ngochalona1862018@gmail.com')->send(new InvoiceMail());
    }
}
