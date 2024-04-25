<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function product() {
        return view('admin.product');
    }

    public function showproduct() {
        $product= Product::all();
        return view('admin.showproduct',compact('product'));
    }


  
}
