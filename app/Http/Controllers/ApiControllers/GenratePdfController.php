<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseOrder;
use Exception;

class GenratePdfController extends Controller
{
    //
    public function index($po_no)
    {
        // return asset('test');
        $getPo =  PurchaseOrder::with(['service_no'=> function ($query) {
            $query->select('*', DB::raw('ST_X(geom) as x'), DB::raw('ST_Y(geom) as y'));
        }])->with('user')->where('po_number',$po_no)->first();

        if (!$getPo) {
            return response()->json(['statusCode' => 404, 'message' => 'Purchase order not found'], 404);
        }
       
        $htmlContent = '
        <!DOCTYPE html>
        <html lang="en">   
            <head>
                        <!-- App css -->
                <link href="'.asset("assets/css/config/default/bootstrap.min.css").'" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"/>
                <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
                <script src="'.asset("map/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js") .'"></script>
                <style>
                .table-borderles,
                .table-borderles tbody,
               .table-borderles tr,
               .table-borderles td {
                    border: none !important;
                }
                </style>
                </head>
        
            <body>        
                <div class="content-page">
                    <div class="content">
                        <div class="row">
                            <div class="container  col-md-7">
                                <div class="card p-3 ">
                                    <h3 class="text-center">Purchase Order</h3>
                                    <div class="col-6 p-3">
                                    <table class="table table-borderles" id="for-border">
                                        <tr >
                                            <td class="col-md-6"><strong> Vendor Name</strong></td>
                                            <td>'.$getPo->user->name.'</td>
                                        </tr>
                                        <tr >
                                            <td class="col-md-6"><strong> Vendor Email</strong></td>
                                            <td>'.$getPo->user->email.'</td>
                                        </tr>
                                        <tr >
                                            <td class="col-md-6"><strong> Vendor No</strong></td>
                                            <td>'.$getPo->vendor_no.'</td>
                                        </tr>
                                        <tr >
                                            <td class="col-md-6"><strong>PO No</strong></td>
                                            <td>'.$getPo->po_number.'</td>
                                        </tr>
                                        
                                        
                                    </table>
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
                                                <tr >
                                            <td class="col-md-6"><strong>Status</strong></td>
                                            <td>'.$item->status.'</td>
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
        try{
        $bytesWritten = File::put(public_path('assets/PurhaseOrderPDF/html/'.$getPo->po_number.'.html'), $htmlContent);
        }catch(Exception $e){

        }
        $path = public_path("assets\PurhaseOrderPDF");

        if ($bytesWritten !== false) {

            try{
                PurchaseOrder::where('po_number',$po_no)->update(['report'=>'assets/PurhaseOrderPDF/pdfs/'.$getPo->po_number.'.pdf']);
                
            }catch(Exception $e){
                
            }   

           $response =  file_get_contents(asset('assets\PurhaseOrderPDF\wkhtmltopdf\bin\text.php?po_no='.$po_no.'&&path='.$path));

           return response()->json(['statusCode' => 200, 'message' => 'Report Genrated'], 200);

        // if($response !== false && !empty($response)){
            // return response()->download(asset('assets/PurhaseOrderPDF/html/'.$getPo->po_number.'.pdf'));
              

        // }

        } 
        return response()->json(['statusCode' => 500, 'message' => 'failed'], 500);
       
    }

}
