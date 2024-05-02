<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function product() {
        return view('admin.product');
    }

    public function showorder(){
        $order=Order::all();
        return view('admin.showorder',compact('order'));
    }

    public function updatestatus($id){
        $order=Order::find($id);
        $order->status='Delivered';
        $order->save();
        return redirect()->back();
    }
    public function showproduct() {
        $product= Product::all();
        return view('admin.showproduct',compact('product'));
    }


  
}
