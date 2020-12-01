<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\User;
use App\Order;
use Session;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->input();
            $adminCount = Admin::where(['username' => $data['username'], 'password' => md5($data['password']), 'status' => 1])->count();

            // dang nhap dung vao dashboard
            if($adminCount > 0)
            {
                Session::put('adminSession', $data['username']);
                return redirect('admin/dashboard');
            }
            else{
                // trang login
                return redirect('/admin')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){

        $countUser = User::where('admin', 0)->count();
        $aveunes = Order::where('order_status','Paid')->get();
        $totalAveune = 0;
        foreach ($aveunes as $key => $value) {
            $totalAveune += $value->grand_total;
        }


        $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');


        $avenue = Order::select(\DB::raw("SUM(grand_total) as sum"))->where('order_status','Paid')
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('sum');

        $monthOfAvenue = Order::select(\DB::raw("Month(created_at) as month"))->where('order_status','Paid')
        ->whereYear('created_at', date('Y'))->distinct('month')->pluck('month');


        return view('admin.dashboard', compact('countUser','totalAveune', 'users','avenue', 'monthOfAvenue'));
    }

    // Admin logout
    public function logout()
    {
        // Session::flush(); hủy tất cả các session login kể cả login user
        Session::forget('adminSession');
        return redirect('/admin')->with('flash_message_success','You are loged out');
    }

    // Admin changePassword
    public function changePassword(Request $request)
    {
        $userDetail = Admin::where(['status' => 1])->first();
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $adminCount = Admin::where(['username' => Session::get('adminSession'), 'password' => md5($data['current_pwd']), 'status' => 1])->count();
            if($adminCount == 1)
            {
                $new_pwd = md5($data['new_pwd']);
                Admin::where(['username' => Session::get('adminSession')])->update(['password' => $new_pwd, 'username' => $data['username']]);
                return redirect()->back()->with('flash_message_success','Update profile successfully');
            }
            else
            {
                return redirect()->back()->with('flash_message_error','current password is incorrect');
            }
        }
        return view('admin.user_profile', compact('userDetail'));
    }
}
