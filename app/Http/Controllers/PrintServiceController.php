<?php

namespace App\Http\Controllers;

use App\Models\ServiceNo;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\File;



class PrintServiceController extends Controller
{
    //

    public function index($sn)
    {
        $order['service']       = ServiceNo::where('sn',$sn)->first();
        $order['during_images'] = $order['service']->during_images != '' ? json_decode($order['service']->during_images) : '';
        $order['after_images']  = $order['service']->after_images  != '' ? json_decode($order['service']->after_images)  : '';
        $order['before_images'] = $order['service']->before_images != '' ? json_decode($order['service']->before_images) : '';

        return view('PurchaseOrder.Print.index',['order'=>$order]);
    }


    public function test()
    {
        $htmlContent = '<html><head><title>Example HTML File</title></head><body><h1>Hello, Laravel!</h1></body></html>';
        File::put(public_path('example.html'), $htmlContent);
        
        return 'HTML file created successfully!';
        
    }
}
