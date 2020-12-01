<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function viewCustomers()
    {
        $userDetails = User::get();
        return view('admin.users.customer', compact('userDetails'));
    }

    // Admin update customer status
    public function updateStatus($id = null)
    {
        $data = User::where('id', $id)->first();;
        $curentStatus = $data['status'];


        if($curentStatus == 1)
        {
            User::where('id', $id)->update(['status' => 0]);
            echo "Unactive";
        }
        if($curentStatus == 0)
        {
            User::where('id', $id)->update(['status' => 1]);
            echo "Active";
        }
    }

    // Admin delete customer
    public function deleteCustomer($id = null)
    {
        User::where(['id'=>$id])->delete();
        Alert::success('Deleted', 'Success Message');
        return redirect()->back();
    }
}
