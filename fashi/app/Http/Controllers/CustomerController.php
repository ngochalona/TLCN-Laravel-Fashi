<?php

namespace App\Http\Controllers;

use App\Banners;
use App\Blog;
use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function viewCustomers()
    {
        $userDetails = User::where('isDelete', 0)->get();
        return view('admin.users.customer', compact('userDetails'));
    }

    // Mở trang khôi phục dữ liệu đã xóa
    public function viewRestoreCus()
    {
        $customers = User::where('isDelete', 1)->get();
        return view('admin.users.delete_cus', compact('customers'));
    }

    // Khôi phục dữ liệu đã xóa
    public function restore($id=null)
    {
        User::where('id', $id)->update(['isDelete' => 0]);
        echo "khoiphuc";
    }

    // Admin delete customer
    public function deleteCustomer($id = null)
    {
        User::where('id', $id)->update(['isDelete' => 1]);
        Alert::success('Deleted', 'Success Message');
        return redirect()->back();
    }
}
