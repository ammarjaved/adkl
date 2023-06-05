<?php

namespace App\Http\Controllers;


use App\Models\ServiceNo;
use Illuminate\Http\Request;



class PrintServiceController extends Controller
{
    //

    public function index($sn)
    {
        $order['service'] = ServiceNo::where('sn', $sn)->first();
        $order['during_images'] = $order['service']->during_images != '' ? json_decode($order['service']->during_images) : '';
        $order['after_images'] = $order['service']->after_images != '' ? json_decode($order['service']->after_images) : '';
        $order['before_images'] = $order['service']->before_images != '' ? json_decode($order['service']->before_images) : '';

        return view('PurchaseOrder.Print.index', ['order' => $order]);
    }

}
