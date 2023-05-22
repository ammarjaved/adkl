<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrder extends Controller
{
    //

    public function insert(Request $request)
    {
    $vendor = DB::select("SELECT id from po_details where po_number = '$request->po_no'");
        if($vendor){
            return redirect()->back()->with('message',"Purhase Order Number Already Exists");
        }
        DB::insert("INSERT INTO po_details (vendor_id, po_number) values ($request->vendor_id, '$request->po_no')");
         return redirect()->back();
    }
}
