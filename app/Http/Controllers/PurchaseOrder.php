<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder as ModelsPurchaseOrder;
use App\Models\ServiceNo;
use App\Models\User;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ResponseInterface;

class PurchaseOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $order = ModelsPurchaseOrder::with('service_no')->get();
      $order = DB::select("SELECT *
        FROM po_details
        INNER JOIN service_no_details
        ON po_details.po_number=service_no_details.po_no 
        INNER JOIN vendor ON po_details.vendor_id= vendor.id 
        INNER JOIN users ON vendor.user_id=users.id");
        return view('PurchaseOrder.index',['orders'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $vendor =  DB::select("SELECT id from po_details where po_number = '$request->po_no'");
        $vendor = ModelsPurchaseOrder::where('po_number', $request->po_no)->first();
        if ($vendor) {
            return redirect()
                ->route('vendor.index')
                ->with('message', 'Purhase Order Number Already Exists');
        }
        $vendor_id = Vendor::where('user_id',$request->vendor_id)->first();
        try {
            ModelsPurchaseOrder::create([
                'vendor_id' => $vendor_id->id,
                'user_id' => $request->vendor_id,
                'po_number' => $request->po_no,
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
            return redirect()
                ->route('vendor.index')
                ->with('message', 'Something is worng try agian later');
        }
        // DB::insert("INSERT INTO po_details (vendor_id, po_number) values ($request->vendor_id, '$request->po_no')");
        return redirect()
            ->route('vendor.index')
            ->with('success', 'Purchase Number Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order['service'] = ServiceNo::where('sn',$id)->first();
        return view('PurchaseOrder.show',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSnByPo($id)
    {
        $purchase = ServiceNo::where('po_no',$id)->get();
        return response()->json([$purchase]);
    }
}
