<?php

namespace App\Http\Controllers;

use App\Models\ServiceNo;
use Illuminate\Http\Request;

class PrintServiceController extends Controller
{
    //

    public function index($sn)
    {
        $order['service'] =  ServiceNo::where('sn',$sn)->first();
        return view('PurchaseOrder.Print.index',['order'=>$order]);
    }
}
