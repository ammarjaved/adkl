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
        $order['service'] = ServiceNo::where('sn', $sn)->first();
        $order['during_images'] = $order['service']->during_images != '' ? json_decode($order['service']->during_images) : '';
        $order['after_images'] = $order['service']->after_images != '' ? json_decode($order['service']->after_images) : '';
        $order['before_images'] = $order['service']->before_images != '' ? json_decode($order['service']->before_images) : '';

        return view('PurchaseOrder.Print.index', ['order' => $order]);
    }

    public function test()
    {
        $htmlContent = '
        <!DOCTYPE html>
        <html lang="en">   
            <head>
                        <!-- App css -->
                <link href="http://127.0.0.1:8000/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"/>
                <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
                <script src="http://127.0.0.1:8000/map/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js"></script>
            </head>
        
            <body>        
                <div class="content-page">
                    <div class="content">
                        <div class="row">
                            <div class="container  col-md-7">
                                <div class="card p-3 ">
                                    <h3 class="text-center">Purchase Order</h3>
                                    <div class="row p-3">
                                        <div class="row">
                                            <div class="col-md-3">Vendor Name</div>
                                            <div class="col-md-5">power_corporation</div>
                                        </div>
            
                                        <div class="row">
                                            <div class="col-md-3">Vendor No</div>
                                            <div class="col-md-5">26752481</div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-md-3">Vendor Email</div>
                                            <div class="col-md-5">test@email.com</div>
                                        </div>
                                    </div>
                            
                                    <table class="table table-bordered my-3">
                                        <tbody>
                                            <tr>
                                                <th class="text-center" style="background: black ; color:white" colspan="2">
                                                SERVICE NO DEATIL
                                                </th>
                                            </tr>
                                            <tr class="" >
                                                <th class="col-md-6">Service No</th>
                                                <td>1110002255171</td>
                                            </tr>
                                            <tr class="">
                                                <th class="col-md-6">Created At</th>
                                                <td>2023-05-31</td>
                                            </tr>
                                            <tr class="">
                                                <th class="col-md-6">Address</th>
                                                <td>Lahore Punjab Pakistan</td>
                                            </tr>
                                            <tr class="">
                                                <th class="col-md-6 text-center" colspan="2"><strong> Before Images </strong><br></th>
                                            </tr>
                                            <tr>
                                            <td class="text-center">
                                                <a href="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-before-image-1-1685538257.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-before-image-1-1685538257.jpg"
                                                        width="275" height="275"></a>
                                            </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-before-image-2-1685538257.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-before-image-2-1685538257.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-before-image-3-1685538257.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-before-image-3-1685538257.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    <td></td>
                                        </tr>
                                                                                                          <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> During Images </strong><br></th>
        
                            </tr>
        
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-during-image-1-1685538257.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-during-image-1-1685538257.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    <td></td>
                                        </tr>
                                                                                
                    <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> After Images </strong><br></th>
        
                            </tr>
        
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-after-image-1-1685538257.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-after-image-1-1685538257.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-after-image-2-1685538257.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-after-image-2-1685538257.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-after-image-3-1685538257.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/1110002255171-after-image-3-1685538257.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    <td></td>
                                        </tr>
                                                                                                </tbody>
        
        
                        </table>
        
                     
                               
                         <table class="table table-bordered my-3">
                        
                            <tbody>
                                 <tr>
                                <th class="text-center" style="background: black ; color:white" colspan="2">
                                   SERVICE NO DEATIL
                                </th>
                         </tr>
                            <tr class="" >
                                <th class="col-md-6">Service No</th>
                                <td>111222172</td>
                            </tr>
                            <tr class="">
                                <th class="col-md-6">Created At</th>
                                <td>2023-05-31</td>
                            </tr>
                            <tr class="">
                                <th class="col-md-6">Address</th>
                                <td>Lahore Cantt., Lahore, Punjab, Pakistan</td>
                            </tr>
                    
                            <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> Before Images </strong><br></th>
        
                            </tr>
                            
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222172-before-image-1-1685542970.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222172-before-image-1-1685542970.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222172-before-image-2-1685542970.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222172-before-image-2-1685542970.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                          <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> During Images </strong><br></th>
        
                            </tr>
        
                                                    <tr>
                                    <td colspan="2">No Image found</td>
                                </tr>
                            
                    <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> After Images </strong><br></th>
        
                            </tr>
        
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222172-after-image-1-1685542970.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222172-after-image-1-1685542970.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222172-after-image-2-1685542970.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222172-after-image-2-1685542970.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222172-after-image-3-1685542970.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222172-after-image-3-1685542970.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    <td></td>
                                        </tr>
                                                                                                </tbody>
        
        
                        </table>
        
                     
                               
                         <table class="table table-bordered my-3">
                        
                            <tbody>
                                 <tr>
                                <th class="text-center" style="background: black ; color:white" colspan="2">
                                   SERVICE NO DEATIL
                                </th>
                         </tr>
                            <tr class="" >
                                <th class="col-md-6">Service No</th>
                                <td>111222173</td>
                            </tr>
                            <tr class="">
                                <th class="col-md-6">Created At</th>
                                <td>2023-05-31</td>
                            </tr>
                            <tr class="">
                                <th class="col-md-6">Address</th>
                                <td>Lahore Cantt., Lahore, Punjab, Pakistan</td>
                            </tr>
                    
                            <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> Before Images </strong><br></th>
        
                            </tr>
                            
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-1-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-1-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-2-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-2-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-3-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-3-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-4-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-4-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-5-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-before-image-5-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    <td></td>
                                        </tr>
                                                                                                          <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> During Images </strong><br></th>
        
                            </tr>
        
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-during-image-1-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-during-image-1-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    <td></td>
                                        </tr>
                                                                                
                    <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> After Images </strong><br></th>
        
                            </tr>
        
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-1-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-1-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-2-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-2-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-3-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-3-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-4-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-4-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-5-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-5-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-6-1685543066.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/111222173-after-image-6-1685543066.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                </tbody>
        
        
                        </table>
        
                     
                               
                         <table class="table table-bordered my-3">
                        
                            <tbody>
                                 <tr>
                                <th class="text-center" style="background: black ; color:white" colspan="2">
                                   SERVICE NO DEATIL
                                </th>
                         </tr>
                            <tr class="" >
                                <th class="col-md-6">Service No</th>
                                <td>11100011225</td>
                            </tr>
                            <tr class="">
                                <th class="col-md-6">Created At</th>
                                <td>2023-06-01</td>
                            </tr>
                            <tr class="">
                                <th class="col-md-6">Address</th>
                                <td>Link Road Lahore Pakistan, Street 4.</td>
                            </tr>
                    
                            <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> Before Images </strong><br></th>
        
                            </tr>
                            
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-1-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-1-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-2-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-2-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-3-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-3-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-4-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-4-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-5-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-5-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-6-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-6-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-7-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-7-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-8-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-8-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-9-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-9-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-10-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-before-image-10-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                          <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> During Images </strong><br></th>
        
                            </tr>
        
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-during-image-1-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-during-image-1-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-during-image-2-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-during-image-2-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                
                    <tr class="">
                                <th class="col-md-6 text-center" colspan="2"><strong> After Images </strong><br></th>
        
                            </tr>
        
                                                                                                                                    <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-1-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-1-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-2-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-2-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-3-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-3-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                                        
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-4-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-4-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    </tr>
                                                                                                                        <tr>
                                    
                                    <td class="text-center">
                                        <a href="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-5-1685635344.jpg" data-lightbox="roadtrip"><img src="http://121.121.232.54:9090/asset/images/upload-images/11100011225-after-image-5-1685635344.jpg"
                                                width="275" height="275"></a>
        
                                    </td>
        
        
                                                                    <td></td>
                                        </tr>
                                                                                                </tbody>
        
        
                        </table>
        
                     
                        
                        
        
            <div id="map" class="map" style="height: 400px; "></div>
        
                    </div>
        
        
        
                </div>
        
        
            </div>
            </div>
                    </div>
                    <!-- content -->
        
                    
        
                </div>
        
                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->
        
            </div>
          
        
            <script>
                map = L.map("map").setView([3.016603, 101.858382], 11);
                document.getElementById("map").style.cursor = "pointer"
                L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
                L.marker([3.016603, 101.858382]).addTo(map)
            </script>
        
        
        
            
        
        </body>
        
        </html>';
        File::put(public_path('example.html'), $htmlContent);

        return 'HTML file created successfully!';
    }
}
