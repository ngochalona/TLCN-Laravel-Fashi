<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use View;
use DB;
use App\Category;


class UsersController extends Controller
{
    function __construct()
    {
        View::composer(['*'], function ($view) {
            $categoriess = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();
            View::share('categoriess',$categoriess);
        });

    }
    public function userLogin(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required|min:6|max:32',
            ],[
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'password.required'=>'Bạn chưa nhập pass',
                'password.min'=>'mật khẩu có ít nhất 6 kí tự',
                'password.max'=>'mật khẩu có tối đa 32 kí tự',
            ]);

            $data = $request->all();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                $userStatus = User::where(['email' => $data['email']])->first();
                if($userStatus->status == 0)
                {
                    return redirect()->back()->with('flash_message_error', 'Tài khoản chưa được kích hoạt. Kích hoạt tài khoản trong email của bạn. ');
                }
                Session::put('frontSession',$data['email']);
                if(!empty(Session::get('session_id')))
                {
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id', $session_id)->update(['user_email' => $data['email']]);
                }
                return redirect('/');
            }
            else{
                return redirect()->back()->with('flash_message_error','Invalid username and password');
            }
        }
        return view('fashi.users.login');
    }
    public function userRegister(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                'name'=>'required|min:6',
                'email'=>'required|email|unique:users,email',// phải là email, không được trùng trong bảng user tại cột email
                'password'=>'required|min:6|max:32',
                'passwordAgain'=>'required|same:password',
            ],[
                'name.required'=>'Bạn chưa nhập tên',
                'name.min'=>"Tên người dùng phải có ít nhất 6 kí tự",
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập pass',
                'password.min'=>'mật khẩu có ít nhất 6 kí tự',
                'password.max'=>'mật khẩu có tối đa 32 kí tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại pass',
                'passwordAgain.same'=>'mật khẩu không khớp'

            ]);

            $data = $request->all();
            //adding user in table
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();


            // confirm email
            $email = $data['email'];
            $message = ['email' => $data['email'], 'name' => $data['name'], 'code' => base64_encode($data['email'])];
            Mail::send('fashi.email.confirm', $message, function ($message) use($email) {
                $message->to($email, 'John Doe');
                $message->subject('Đăng ký tài khoản Fashi');
            });
            return redirect()->back()->with('flash_message_error', 'Kích hoạt tài khoản trong email của bạn. ');



            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                Session::put('frontSession',$data['email']);
                if(!empty(Session::get('session_id')))
                {
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id', $session_id)->update(['email' => $data['email']]);
                }
                return redirect('/');
            }
        }
        return view('fashi.users.register');
    }

    public function logout()
    {
        Session::forget('frontSession');
        Auth::logout();
        return redirect('/');
    }

    public function confirmAccount($email)
    {
        $email = base64_decode($email);
        $userCount = User::where(['email' => $email])->count();
        if($userCount > 0)
        {
           $userDetails = User::where(['email' => $email])->first();
           if($userDetails->status == 1)
           {
                return redirect('/userLogin')->with('flash_message_error', 'Tài khoản của bạn đã được kích hoạt. ');
           }
           else{
                User::where(['email' => $email])->update(['status' => 1]);

                // gửi email chào
                $message = ['email' => $email, 'name' => $userDetails->name];
                Mail::send('fashi.email.welcome', $message, function ($message) use($email) {
                    $message->to($email);
                    $message->subject('Chào mừng đến với Fashi Shop');
                });

                return redirect('/userLogin')->with('flash_message_success', 'Chúc mừng, tài khoản của bạn đã kích hoạt. ');
           }
        }
        else{
            abort(404);
        }
    }

    public function account(Request $request)
    {
        return view('fashi.users.account');
    }
    public function changePassword(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $old_pwd = User::where('id', Auth::User()->id)->first();
            $current_password = $data['current_password'];
            //old_pwd là dưới csdl đã bị mã hóa,
            //hàm này để so pass mới chưa mã hóa với pass  cũ đã mã hóa
            if(Hash::check($current_password, $old_pwd->password))// neu trung
            {
                // mã hóa pass mới
                $new_pwd = bcrypt($data['new_pwd']);
                //update pass new vao id cua user do
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('flash_message_success','Password is changed now!');
            }
            else
            {
                return redirect()->back()->with('flash_message_error','Old Password is Incorrect');
            }
        }
        return view('fashi.users.change_password');
    }
    public function changeAddress(Request $request)
    {
        $user_id = Auth::user()->id;    // lay id cua user dang login
        $userDetails = User::find($user_id);    //lay thogn tin cua user dang login
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $users = User::find($user_id);
            $users->name = $data['name'];
            $users->address = $data['address'];
            $users->city = $data['city'];
            $users->state = $data['state'];
            $users->ward = $data['ward'];
            $users->mobile = $data['mobile'];
            $users->save();
            return redirect()->back()->with('flash_message_success','Account Details has been updated');
        }
        return view('fashi.users.change_address', compact('countries', 'userDetails'));
    }
}
