<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\ServiceNo;
use App\Models\Vendor;
use Illuminate\Http\Request;

class FilterMapController extends Controller
{
    //
    public function show()
    {
        $vendor = Vendor::all();
        return view('Map.index',['vendor'=>$vendor]);
    }

    public function getPo($id)
    {
        $po = PurchaseOrder::where('user_id',$id)->get();
        return response()->json([$po]);
    }

    public function getSn($po)
    {
        $sn = ServiceNo::where('po_no',$po)->get();
        return response()->json([$sn]);
    }


    public function queryFunction($query)
    {
        # code...
    }
}
