<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillsDetails;
use App\ProductsAttributes;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use DB;



class OrdersController extends Controller
{
    public function viewOrders()
    {
        $orders = Order::with('orders')->orderBy('id','DESC')->get();
        return view('admin.orders.view_orders', compact('orders'));
    }

    public function viewOrdersDetails($id=null)
    {
        $orderDetails = Order::with('orders')->where('id', $id)->first();
        $user_id = $orderDetails->user_id;
        //laays thong tin user co don hang nay
        $userDetails = User::where('id', $user_id)->first();
        return view('admin.orders.order_details', compact('orderDetails', 'userDetails'));

    }

    public function updateOrderStatus(Request $request )
    {
        $data = $request->all();
        $or = Order::where('id', $data['order_id'])->first();
        $currentStatus = $or->order_status;
        if($currentStatus != "Đã thanh toán")
        {
            // Update status
            Order::where('id', $data['order_id'])->update(['order_status' => $data['order_status']]);
            if($data['order_status'] == "Đã thanh toán")
            {
                // Add vào bill
                $order = Order::where(['id' => $data['order_id']])->first();
                $bill = new Bill;
                $bill->user_id = $data['user_id'];
                $bill->user_email = $data['user_email'];
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
                $orderDetails = Order::with('orders')->where('id', $data['order_id'])->first();
                foreach ($orderDetails->orders as $item)
                {
                    $cartPro = new BillsDetails;// bảng orderDetails
                    $cartPro->bill_id = $bill_id;
                    $cartPro->user_id = $data['user_id'];
                    $cartPro->product_id = $item->product_id;
                    $cartPro->product_code = $item->product_code;
                    $cartPro->product_name = $item->product_name;
                    $cartPro->product_size = $item->product_size;
                    $cartPro->product_price = $item->product_price;
                    $cartPro->product_qty = $item->product_qty;
                    $cartPro->save();

                    // Trừ sp trong stock
                    $getStock = ProductsAttributes::where(['size' => $item->product_size, 'product_id' => $item->product_id])->first();
                    $stock = $getStock->stock;
                    ProductsAttributes::where(['size' => $item->product_size, 'product_id' => $item->product_id])->update(['stock' => $stock - $item->product_qty]);
                }
            }

//            if($data['order_status'] == "Trả hàng")
//            {
//                $orderDetails = Order::with('orders')->where('id', $data['order_id'])->first();
//
//                foreach ($orderDetails->orders as $item)
//                {
//                    // Cộng sp trong stock
//                    $getStock = ProductsAttributes::where(['size' => $item->product_size, 'product_id' => $item->product_id])->first();
//                    $stock = $getStock->stock;
//                    ProductsAttributes::where(['size' => $item->product_size, 'product_id' => $item->product_id])->update(['stock' => $stock + $item->product_qty]);
//                }
//            }
        }


        return redirect()->back()->with('flash_message_success','Order Status has been updated');
    }
}
