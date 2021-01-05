<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;// package intervention image
use App\Product;
use App\Category;
use App\ProductsAttributes;
use App\Coupons;


class CouponsController extends Controller
{
    public function addCoupon(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $coupon = new Coupons;
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['coupon_amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->save();
            return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been added successfully');
        }
        return view('admin.coupons.add_coupon');
    }
    public function viewCoupons()
    {
        $coupons = Coupons::where('isDelete', 0)->get();
        return view('admin.coupons.view_coupons', compact('coupons'));
    }
    public function editCoupon(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $coupon = Coupons::find($id);
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['coupon_amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->save();
            return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been updated successfully');
        }
        $couponDetails = Coupons::find($id);
        return view('admin.coupons.edit_coupon',compact('couponDetails'));
    }
    public function deleteCoupon($id = null)
    {
        Coupons::where(['id'=>$id])->update(['isDelete' => 1]);
        Alert::success('Deleted', 'Success Message');
        return redirect()->back();
    }
    public function updateStatus($id=null)
    {
        $data = Coupons::where('id', $id)->first();;
        $curentStatus = $data['status'];


        if($curentStatus == 1)
        {
            Coupons::where('id', $id)->update(['status' => 0]);
            echo "Hiện";
        }
        if($curentStatus == 0)
        {
            Coupons::where('id', $id)->update(['status' => 1]);
            echo "Ẩn";
        }
    }

    // Mở trang khôi phục dữ liệu đã xóa
    public function viewRestoreCoupon()
    {
        $coupons = Coupons::where('isDelete', 1)->get();
        return view('admin.coupons.delete_coupons', compact('coupons'));
    }

    // Khôi phục dữ liệu đã xóa
    public function restoreStatus($id=null)
    {
        Coupons::where('id', $id)->update(['isDelete' => 0]);
        echo "Unactive";
    }

}
