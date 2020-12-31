<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\User;
use App\Bill;
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
        $aveunes = Bill::get();
        $totalAveune = 0;
        foreach ($aveunes as $key => $value) {
            $totalAveune += $value->grand_total;
        }


        $users = User::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');


        $test = Bill:: select(\DB::raw("SUM(grand_total) as sum, month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(\DB::raw("Month(created_at)"))->pluck('sum','month');
        $avenue = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach ($test as $key => $value)
        {
            $avenue[$key - 1] = $value;
        }

//

        $dataPoints = array(
            array("x"=> 1, "y"=> $avenue[0]),
            array("x"=> 2, "y"=> $avenue[1]),
            array("x"=> 3, "y"=> $avenue[2]),
            array("x"=> 4, "y"=> $avenue[3]),
            array("x"=> 5, "y"=> $avenue[4]),
            array("x"=> 6, "y"=> $avenue[5]),
            array("x"=> 7, "y"=> $avenue[6]),
            array("x"=> 8, "y"=> $avenue[7]),
            array("x"=> 9, "y"=> $avenue[8]),
            array("x"=> 10, "y"=> $avenue[9]),
            array("x"=> 11, "y"=> $avenue[10]),
            array("x"=> 12, "y"=> $avenue[11])
        );

        return view('admin.dashboard', compact('countUser','totalAveune','avenue', 'dataPoints'));
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
