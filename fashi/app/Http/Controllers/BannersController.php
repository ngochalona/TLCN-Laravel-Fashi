<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;// package intervention image
use App\Banners;

class BannersController extends Controller
{
    // Admin view banners
    public function banners(){
        $banners = Banners::where('isDelete', 0)->get();
        return view('admin.banner.banners', compact('banners'));
    }

    // Admin update status banners
    public function updateStatus($id=null)
    {
        $data = Banners::where('id', $id)->first();;
        $curentStatus = $data['status'];


        if($curentStatus == 1)
        {
            Banners::where('id', $id)->update(['status' => 0]);
            echo "Hiện";
        }
        if($curentStatus == 0)
        {
            Banners::where('id', $id)->update(['status' => 1]);
            echo "Ẩn";
        }
    }

    // Admin add banners
    public function addBanner(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $banner = new Banners;
            $banner->name = $data['banner_name'];
            $banner->content = $data['banner_content'];

            //upload image
            if($request->hasFile('image'))  //nếu như có chọn hình mới
            {
                $img_tmp = Input::file('image'); // lấy hình đó ra
                if($img_tmp->isValid())
                {
                    //image path code
                    $extension = $img_tmp->getClientOriginalExtension(); // lấy đuôi hình
                    $filename = rand(111,99999) . '.' . $extension;  // đặt tên hình
                    $img_path = 'uploads/banners/'.$filename;  //tạo đường dẫn lưu hình

                    //image resize and lưu vào dường dẫn thư mục hình
                    Image::make($img_tmp)->save($img_path);
                    $banner->image = $filename;
                }
            }
            $banner->save();
            return redirect('/admin/banners')->with('flash_message_success','Banner has been created ');
        }
        return view('admin.banner.add_banner');
    }

    // Admin edit banners
    public function editBanner(Request $request, $id = null)
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
                    $img_path = 'uploads/banners/'.$filename;  //tạo đường dẫn lưu hình

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
            Banners::where('id',$id)->update(['name'=>$data['banner_name'],
            'content'=>$data['banner_content'], 'image'=>$filename]);

            return redirect('/admin/banners')->with('flash_message_success','Banner has been updated ');

        }

        $bannerDetails = Banners::where(['id'=>$id])->first();
        return view('admin.banner.edit_banner', compact('bannerDetails'));
    }

    // Admin delete banners
    public function deleteBanner($id = null)
    {
        Banners::where(['id'=>$id])->update(['isDelete' => 1]);
        Alert::success('Deleted', 'Success Message');
        return redirect()->back();
    }

    // Mở trang khôi phục dữ liệu đã xóa
    public function viewRestoreBanner()
    {
        $banners = Banners::where('isDelete', 1)->get();
        return view('admin.banner.delete_banners', compact('banners'));
    }

    // Khôi phục dữ liệu đã xóa
    public function restoreStatus($id=null)
    {
        Banners::where('id', $id)->update(['isDelete' => 0]);
        echo "Unactive";
    }
}
