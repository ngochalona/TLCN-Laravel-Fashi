<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;


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
        if($request->isMethod('post'))
        {
            $data = $request->all();
        }
        Order::where('id', $data['order_id'])->update(['order_status' => $data['order_status']]);
        return redirect()->back()->with('flash_message_success','Order Status has been updated');
    }
}
