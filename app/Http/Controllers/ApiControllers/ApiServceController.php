<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Exception;

class ApiServceController extends Controller
{
    //

    public function getAll($po_no)
    {
        try{
       $getPo =  PurchaseOrder::with('service_no','user')->where('po_number',$po_no)->first();
       return response()->json($getPo);
        }catch(Exception $e){
            return redirect()->route('vendor.index')->with('message', 'Something is wrong try again later');
        }
    }
}
