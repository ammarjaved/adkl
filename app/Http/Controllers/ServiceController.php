<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\ServiceNo;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $order['service'] = ServiceNo::where('po_no',$poNo)->get();

        $order = ServiceNo::query();
        $user = \Auth::user();
        if($user->type !== 'admin'){
            $order->where('created_by', $user->id);
        }
        $order = $order->get();
        return view('ServiceNo.index',['orders'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $po = PurchaseOrder::query();
        $user = \Auth::user();
        if ($user->type !== 'admin') {
            $po->where('user_id' ,$user->id );
        }
        $po = $po->get();
        return view("ServiceNo.create",['pos'=>$po]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order['service'] = ServiceNo::where('sn', $id)->first();

        $order['during_images'] = $order['service']->during_images != '' ? json_decode($order['service']->during_images) : '';

        $order['after_images']  = $order['service']->after_images  != '' ? json_decode($order['service']->after_images)  : '';

        $order['before_images'] = $order['service']->before_images != '' ? json_decode($order['service']->before_images) : '';
        $order['other_images'] = $order['service']->other_images != '' ? json_decode($order['service']->other_images) : '';


        return view('ServiceNo.show', ['order' => $order]);
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


    public function getAll($po_no)
    {
        try
        {
            $getPo =  PurchaseOrder::with('service_no','user')->where('po_number',$po_no)->first();
            return $getPo ? view('PurchaseOrder.getAllSn',['order'=>$getPo]) : abort(404) ;
        }
        catch(Exception $e){
            return redirect()->route('vendor.index')->with('message', 'Something is wrong try again later');
        }
    }
}
