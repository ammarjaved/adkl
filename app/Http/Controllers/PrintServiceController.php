<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\ServiceNo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $getPo =  PurchaseOrder::with(['service_no'=> function ($query) {
            $query->select('*', DB::raw('ST_X(geom) as x'), DB::raw('ST_Y(geom) as y'));
        }])->with('user')->where('po_number','41460609')->first();
       
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
                                    <table class="table col-md-5">
                                        <tr >
                                            <td class="col-md-6"><strong> Vendor Name</strong></td>
                                            <td>'.$getPo->user->name.'</td>
                                        </tr>
                                        <tr >
                                            <td class="col-md-6"><strong> Vendor No</strong></td>
                                            <td>'.$getPo->vendor_no.'</td>
                                        </tr>
                                        <tr >
                                            <td class="col-md-6"><strong>PO No</strong></td>
                                            <td>'.$getPo->po_number.'</td>
                                        </tr>
                                        <tr >
                                            <td class="col-md-6"><strong> Vendor Email</strong></td>
                                            <td>'.$getPo->user->email.'</td>
                                        </tr>
                                    </table>
                                        <div class="row">
                                            <div class="col-md-3"><strong> Vendor Name</strong></div>
                                            <div class="col-md-5">'.$getPo->user->name.'</div>
                                        </div>
            
                                        <div class="row">
                                            <div class="col-md-3"><strong>Vendor No</strong></div>
                                            <div class="col-md-5">'.$getPo->vendor_no.'</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"><strong>PO No</strong></div>
                                            <div class="col-md-5">'.$getPo->po_number.'</div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-md-3"><strong>Vendor Email</strong></div>
                                            <div class="col-md-5">'.$getPo->user->email.'</div>
                                        </div>
                                    </div>';
                                    foreach ($getPo->service_no as $item){
                                      $htmlContent .='
                                        <table class="table table-bordered my-3"> 
                                            <tbody> 
                                                <tr>
                                                    <th class="text-center" style="background: black ; color:white" colspan="2">
                                                    SERVICE NO DEATIL 
                                                    </th>
                                                </tr>
                                                <tr class="" >
                                                    <th class="col-md-6">Service No</th>
                                                    <td>'. $item->sn .'</td>
                                                </tr>
                                                <tr class="">
                                                    <th class="col-md-6">Created At</th>
                                                    <td>'. date('Y-m-d',strtotime($item->date )) .'</td>
                                                </tr>
                                                <tr class="">
                                                    <th class="col-md-6">Address</th>
                                                    <td>'. $item->address .'</td>
                                                </tr>
            
                                                <tr class="">
                                                    <th class="col-md-6 text-center" colspan="2"><strong> Before Images </strong><br></th>

                                                </tr>';

                                                if ($item->before_images != ''){
                                                    $before = json_decode( $item->before_images);

                                                    foreach ($before as $index =>$image){
                                                        if ($index % 2 == 0){
                                                            $htmlContent .='<tr>';
                                                            }     
                                                        $htmlContent.=' 
                                                            <td class="text-center">
                                                            <img src="'. $image .'" width="275" height="275">
                                                            </td>';

                                                        if ($index % 2 != 0){
                                                        $htmlContent.='</tr>';
                                                        }
                                                        elseif ($index === count(json_decode(json_encode($before), true)) - 1) {
                                                        $htmlContent .='
                                                            <td></td>
                                                            </tr>';
                                                        }
                                                    }
                                                }    
                                                else{
                                                    $htmlContent .='
                                                        <tr>
                                                            <td colspan="2">No Image found</td>
                                                        </tr>';
                                                }

                                                $htmlContent.='
                                                <tr class="">
                                                    <th class="col-md-6 text-center" colspan="2"><strong> During Images </strong><br></th>

                                                </tr>';

                                                if ($item->during_images != ''){
                                                    $during = json_decode( $item->during_images);

                                                    foreach ($during as $index =>$image){
                                                        if ($index % 2 == 0){
                                                            $htmlContent .='<tr>';
                                                            }     
                                                        $htmlContent.=' 
                                                            <td class="text-center">
                                                            <img src="'. $image .'" width="275" height="275">
                                                            </td>';

                                                        if ($index % 2 != 0){
                                                        $htmlContent.='</tr>';
                                                        }
                                                        elseif ($index === count(json_decode(json_encode($during), true)) - 1) {
                                                        $htmlContent .='
                                                            <td></td>
                                                            </tr>';
                                                        }
                                                    }
                                                }    
                                                else{
                                                    $htmlContent .='
                                                        <tr>
                                                            <td colspan="2">No Image found</td>
                                                        </tr>';
                                                }

                                                $htmlContent.='
                                                <tr class="">
                                                    <th class="col-md-6 text-center" colspan="2"><strong> After Images </strong><br></th>

                                                </tr>';

                                                if ($item->after_images != ''){
                                                    $after = json_decode( $item->after_images);

                                                    foreach ($after as $index =>$image){
                                                        if ($index % 2 == 0){
                                                            $htmlContent .='<tr>';
                                                            }     
                                                        $htmlContent.=' 
                                                            <td class="text-center">
                                                            <img src="'. $image .'" width="275" height="275">
                                                            </td>';

                                                        if ($index % 2 != 0){
                                                        $htmlContent.='</tr>';
                                                        }
                                                        elseif ($index === count(json_decode(json_encode($after), true)) - 1) {
                                                        $htmlContent .='
                                                            <td></td>
                                                            </tr>';
                                                        }
                                                    }
                                                }    
                                                else{
                                                    $htmlContent .='
                                                        <tr>
                                                            <td colspan="2">No Image found</td>
                                                        </tr>';
                                                }

                                                $htmlContent.='
                                            </tbody>
                                        </table> 
                                    <div class="p-3">
                                        <div id="map'.$item->id.'" class="map" style="height: 300px; marign :20px ;"></div>
                                    </div>
                                <script>
                                    map = L.map("map'.$item->id.'").setView(['.$item->y.', '.$item->x.'], 11);
                                    document.getElementById("map'.$item->id.'").style.cursor = "pointer"
                                    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
                                    L.marker(['.$item->y.', '.$item->x.']).addTo(map)
                                </script>   
                                '; 
                            }
                        $htmlContent.='
                </div>
            </body>
        </html>';
        File::put(public_path('assets/PurhaseOrderPDF/html/'.$getPo->po_number.'.html'), $htmlContent);

        return 'HTML file created successfully!';
    }
}
