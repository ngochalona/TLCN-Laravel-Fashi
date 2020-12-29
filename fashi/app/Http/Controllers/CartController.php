<?php

namespace App\Http\Controllers;

use App\BillsDetails;
use App\OrdersDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Image;// package intervention image
use App\Product;
use App\Category;
use App\ProductsAttributes;
use App\ProductsImages;
use Session;
use App\Coupons;
use DB;
use Auth;
use App\User;
use App\Order;
use App\Bill;
use View;


class CartController extends Controller
{
    function __construct()
    {
        View::composer(['*'], function ($view) {
            $categoriess = Category::where('isDelete', 0)->with('categories')->where(['parent_id'=>0])->get();
            View::share('categoriess',$categoriess);
        });

    }
    public function addtoCart(Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();

        if($data['size'] === '0')
        {
            return redirect()->back()->with('flash_message_error','You have not chosen size');
        }
        // neu ngdung mua hang nhung chua login
        if(empty(Auth::user()->email))
        {
            $data['user_email'] = '';
        }
        else// neu ngdung da login thi gan email hien tai
        {
            $data['user_email'] = Auth::user()->email;
        }
        //mới đầu khi add sp vào cart thì biến session_id = rỗng,
        //vô if để random và gán session_id
        // lần sau mua tiếp thì k bị random cái mới nữa
        $session_id = Session::get('session_id');
        if(empty($session_id))
        {
            // random tạo session_id cho bien toan cuc session_id
            $session_id = str_random(40);
            // gan
            Session::put('session_id', $session_id);
        }

        // $sizeArr[0] = product_id         $sizeArr[1] = size
        $sizeArr = explode('-', $data['size']); // tách chuỗi thành mảng

        // Get sku by size
        $productAtt = ProductsAttributes::where(['product_id'=>$data['product_id'], 'size'=>$sizeArr[1]])->first();
        $sku = $productAtt->sku;

        $countProducts = DB::table('cart')->where(['product_id'=>$data['product_id'],'product_code'=>$data['product_code'], 'size'=>$sizeArr[1],
            'price'=>$data['price'], 'session_id'=>$session_id])->count();

        if($countProducts > 0)
        {
            return redirect()->back()->with('flash_message_error','Product already exists in cart');
        }
        else
        {

            // insert vào cart, không sử dụng model
            DB::table('cart')->insert(['product_id'=>$data['product_id'], 'product_name'=>$data['product_name'],
                'product_code'=>$data['product_code'], 'product_sku'=>$sku,
                'price'=>$data['price'], 'size'=>$sizeArr[1], 'quantity'=>$data['quantity'],
                'user_email'=>$data['user_email'], 'session_id'=>$session_id]);
        }

        return redirect('/cart')->with('flash_message_success','Product has been added in cart');
    }

    public function Cart(Request $request)
    {
        if(Auth::check())// neu da login
        {
            $session_id = Session::get('session_id');
            $user_email = Auth::user()->email;
            // lay tat ca sp trong gio hang cua user dang login theo email
            $userCart = DB::table('cart')->where('user_email',$user_email)->orWhere('session_id', $session_id)->get();
        }
        else{
            //chua login thi lay ra tat ca sp trong gio hang theo session_id
            $session_id = Session::get('session_id');        //session hien dang mua hang
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }

        // duyệt từng sp trong giỏ hàng
        foreach($userCart as $key=>$products)
        {
            $productDetails = Product::where(['id' => $products->product_id])->first();
            // gán ảnh của sp đó trong bảng Product cho ảnh của sp trong giỏ hàng
            // chuỗi json $userCart thêm vào field image, dưới cart không có image
            $userCart[$key]->image = $productDetails->image ;
        }

        $coupons = Coupons::where('isDelete', 0)->get();

        return view('fashi.products.cart', compact('userCart', 'coupons'));
    }

    public function deleteCartProduct($id=null)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        DB::table('cart')->where('id',$id)->delete();
        return redirect('/cart')->with('flash_message_error','Product has been deleted in cart');
    }

    public function applyCoupon(Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $couponCount = Coupons::where('isDelete', 0)->where('coupon_code',$data['coupon_code'])->count();
            if($couponCount == 0)
            {
                return redirect()->back()->with('flash_message_error','Coupon does not exist');

            }
            else
            {
                // lấy hết thông tin của coupon được ng dùng nhập vào
                $couponDetails = Coupons::where('isDelete', 0)->where('coupon_code',$data['coupon_code'])->first();
                //coupon code status
                if($couponDetails->status == 0)
                {
                    return redirect()->back()->with('flash_message_error','Coupon code is not active');
                }
                //check coupon expiry date
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if($expiry_date < $current_date)
                {
                    return redirect()->back()->with('flash_message_error','Coupon code is expired');
                }
                //coupon code is ready to discount
                //lấy ra session hiện tại đang mua hàng
                $session_id = Session::get('session_id');

                if(Auth::check())// neu da login
                {
                    $user_email = Auth::user()->email;
                    // lay tat ca sp trong gio hang cua user dang login theo email
                    $userCart = DB::table('cart')->where('user_email',$user_email)->orWhere('session_id', $session_id)->get();
                }
                else{
                    //chua login thi lay ra tat ca sp trong gio hang theo session_id
                    $session_id = Session::get('session_id');        //session hien dang mua hang
                    $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
                }

                $total_amount = 0;
                foreach($userCart as $item)
                {
                    //duyệt từng loại sản phẩm và tính tổng tiền
                    $total_amount = $total_amount + ($item->price * $item->quantity);
                }
                //check if coupon amount is fixed or percentage
                if($couponDetails->amount_type == "Fixed")
                {
                    // số tiền discount
                    $coupon = $couponDetails->amount;// lấy số tiền sẽ giảm
                }
                else
                {
                    $couponAmount = $total_amount * ($couponDetails->amount/100);// tính số tiền phần trăm sẽ giảm
                    $coupon = intval($couponAmount);
                }
                //add coupon
                // lưu vào biến toàn cục session để sang view có thể sử dụng
                Session::put('CouponAmount', $coupon);
                Session::put('CouponCode', $data['coupon_code']);
                return redirect()->back()->with('flash_message_success','Coupon code is successfully Applied. You are discounted');
            }
        }
    }

    public function checkout(Request $request)
    {
        // cac col trong Auth va User giong nhau
        //lay id cua user dang login
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;

        //Update table cart with email
        // $session_id = Session::get('session_id');        //session hien dang mua hang
        // DB::table('cart')->where(['session_id' => $session_id])->update(['user_email' => $user_email]);

        $session_id = Session::get('session_id');
        $userDetails = User::find($user_id);

        $userCart = DB::table('cart')->where('user_email', $user_email)->orWhere('session_id', $session_id)->get();
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }

        if($request->isMethod('post'))
        {

            $this->validate($request,[
                'billing_name'=>'required',
                'billing_address'=>'required',
                'billing_city'=>'required',
                'billing_state'=>'required',
                'billing_ward'=>'required',
                'billing_mobile'=>'required',

            ],[
                'billing_name.required'=>'You have not entered billing name',
                'billing_address.required'=>'You have not entered billing address',
                'billing_city.required'=>'You have not entered billing city',
                'billing_state.required'=>'You have not entered billing state',
                'billing_ward.required'=>'You have not entered billing ward',
                'billing_mobile.required'=>'You have not entered billing mobile',

            ]);

            $data = $request->all();

            // cap nhat dia chi cua user
            User::where('id', $user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address']
                ,'city'=>$data['billing_city'],'state'=>$data['billing_state']
                ,'ward'=>$data['billing_ward'],'mobile'=>$data['billing_mobile']]);

            if(empty(Session::get('CouponCode')))
            {
                $coupon_code = 'Not Used';
            }
            else
            {
                $coupon_code = Session::get('CouponCode');
            }
            if(empty(Session::get('CouponAmount')))
            {
                $coupon_amount = '0';
            }
            else
            {
                $coupon_amount = Session::get('CouponAmount');
            }

            // Add vào orders
            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $data['billing_name'];
            $order->address = $data['billing_address'];
            $order->city = $data['billing_city'];
            $order->state = $data['billing_state'];
            $order->ward = $data['billing_ward'];
            $order->mobile = $data['billing_mobile'];
            $order->coupon_code = $coupon_code;
            $order->coupon_amount = $coupon_amount;
            $order->order_status = "Đang xử lý";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            $order_id = DB::getPdo()->lastinsertID();

            // Add vào orderDetails
            $cartProducts = DB::table('cart')->where(['user_email' => $user_email])->orWhere('session_id', $session_id)->get();
            foreach($cartProducts as $pro)
            {
                $cartPro = new OrdersDetails;// bảng orderDetails
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_size = $pro->size;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();
            }

            Session::put('order_id', $order_id);
            Session::put('grand_total', $data['grand_total']);


            if($data['payment_method'] == "cod")
            {
                // Gửi mail invoice
                $productDetails = Order::with('orders')->where('id', $order_id)->first();
                $productDetails= json_decode(json_encode($productDetails), true);

                $userDetails = User::where('id', $user_id)->first();
                $userDetails= json_decode(json_encode($userDetails), true);

                // Gửi email
                $email = $user_email;
                $messageData = [
                    'email' => $email,
                    'name' => $data['billing_name'],
                    'order_id' => $order_id,
                    'productDetails' => $productDetails,
                    'userDetails' => $userDetails,
                ];
                Mail::send('fashi.email.invoice', $messageData, function ($message) use($email) {
                    $message->to($email);
                    $message->subject('Đơn hàng đã đặt tại Fashi');
                });

                return redirect('/thanks');
            }
            else
            {
                return redirect('/stripe');
            }

        }

        return view('fashi.products.checkout', compact('userDetails', 'userCart'));
    }

    public function thanks()
    {
        $session_id = Session::get('session_id');
        // sau khi thanh toan xong thi xoa sp trong cart
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email', $user_email)->orWhere('session_id', $session_id)->delete();

        // Xóa session coupon sau khi đã đặt hàng xong
        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        return view('fashi.orders.thanks');
    }

    public function stripe(Request $request)
    {
        $session_id = Session::get('session_id');
        $user_email = Auth::user()->email;
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;

        if($request->isMethod('post'))
        {
            $data = $request->all();
            $order_id = $data['order_id'];
            \Stripe\Stripe::setApiKey('sk_test_51GwoihIJzgT2zuf5dJRQDgv7iMZJrQuuPi9Fc1B7XzidaeHZmvsXzz91lKZLUWrbAtZKcFYiDUmF6ddBiEZkuFAx00d4X8uw3Y');

            $token = $_POST['stripeToken'];
            $change = \Stripe\charge::Create([

                'amount' => $request->input('total_amount')*100,
                'currency' =>'vnd',
                'description' => $request->input('name'),
                'source' => $token,
            ]);

            // Add vào bill
            $order = Order::where(['id' => $order_id])->first();
            $bill = new Bill;
            $bill->user_id = $user_id;
            $bill->user_email = $user_email;
            $bill->name = $order->name;
            $bill->address = $order->address;
            $bill->city = $order->city;
            $bill->state = $order->state;
            $bill->ward = $order->ward;
            $bill->mobile = $order->mobile;
            $bill->coupon_code = $order->coupon_code;
            $bill->coupon_amount = $order->coupon_amount;
            $bill->payment_method = $order->payment_method;
            $bill->grand_total = $order->grand_total;
            $bill->save();

            $bill_id = DB::getPdo()->lastinsertID();

            // Add vào billDetails
            $cartProducts = DB::table('cart')->where(['user_email' => $user_email])->orWhere('session_id', $session_id)->get();
            foreach($cartProducts as $pro)
            {
                $cartPro = new BillsDetails;// bảng orderDetails
                $cartPro->bill_id = $bill_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_size = $pro->size;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();
                $getStock = ProductsAttributes::where(['sku'=>$pro->product_sku, 'product_id'=>$pro->product_id])->first();
                $stock = $getStock->stock;
                ProductsAttributes::where(['sku'=>$pro->product_sku, 'product_id'=>$pro->product_id])->update(['stock' => $stock - $pro->quantity]);
            }

            // Trừ hàng trong kho
            DB::table('cart')->where('user_email', $user_email)->orWhere('session_id', $session_id)->delete();

            // Duyệt trạng thái đã thanh toán trong bảng order
            Order::where('id', $order_id)->update(['order_status' => 'Đã thanh toán']);

            // Gửi mail invoice
            $productDetails = Order::with('orders')->where('id', $order_id)->first();
            $productDetails= json_decode(json_encode($productDetails), true);

            $userDetails = User::where('id', $user_id)->first();
            $userDetails= json_decode(json_encode($userDetails), true);

            // Gửi email
            $email = $user_email;
            $messageData = [
                'email' => $email,
                'name' => $user_name,
                'order_id' => $order_id,
                'productDetails' => $productDetails,
                'userDetails' => $userDetails,
            ];
            Mail::send('fashi.email.invoice', $messageData, function ($message) use($email) {
                $message->to($email);
                $message->subject('Đơn hàng đã đặt tại Fashi');
            });
            // Xóa session coupon sau khi đã đặt hàng xong
            Session::forget('CouponAmount');
            Session::forget('CouponCode');
            return redirect()->back()->with('flash_message_success','Your Payment Successfully Done!');
        }
        return view('fashi.orders.stripe');
    }

    public function userOrders()
    {
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id', $user_id)->orderBy('id','DESC')->get();

        return view('fashi.orders.user_orders',compact('orders'));
    }

    public function userOrdersDetails($order_id)
    {
        // get through bill
        $orderDetails = Order::with('orders')->where('id', $order_id)->first();
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id', $user_id)->first();
        return view('fashi.orders.user_order_details',compact('orderDetails','userDetails'));
    }

    public function updateQuantityDec($id=null)
    {
        $data = DB::table('cart')->where('id',$id)->first();
        $currentQuantity = $data->quantity;
        $price = $data->price;
        if($currentQuantity <= 1)
        {
            echo $currentQuantity."-".$price;
        }
        else
        {
            DB::table('cart')->where('id',$id)->decrement('quantity', 1);
            $newdata = DB::table('cart')->where('id',$id)->first();
            $newQuantity = $newdata->quantity;
            echo $newQuantity."-".$price;
        }


    }

    public function updateQuantityInc($id=null)
    {
        $data = DB::table('cart')->where('id',$id)->first();
        $price = $data->price;

        DB::table('cart')->where('id',$id)->increment('quantity', 1);
        $newdata = DB::table('cart')->where('id',$id)->first();
        $newQuantity = $newdata->quantity;
        echo $newQuantity."-".$price;

    }

    public function getStock($id = null)
    {
        $item = DB::table('cart')->where('id',$id)->first();
        $proAtrr = ProductsAttributes::where(['product_id' => $item->product_id,'size' => $item->size])->first();
        echo $proAtrr->stock;
    }

    // khách hàng hủy đơn
    public function cancelOrder($id = null)
    {
        Order::where('id', $id)->update(['order_status' => 'Hủy đơn']);
        echo "success";
    }
}
