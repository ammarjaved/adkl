<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\ServiceNo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        if (ServiceNo::where('sn',$request->sn)->first()) {
            return redirect()->route('service-no.index')->with('failed', 'SN number is already exist');
        }
        $imagePaths = [];
        try
        {
            foreach (['before_images', 'during_images', 'after_images', 'other_images'] as $imageCategory)
            {
                if ($request->hasFile($imageCategory)) {
                    foreach ($request->file($imageCategory) as $file) {
                        $filename = $request->sn .'-'. $imageCategory. '-' .\Str::random(10) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('asset/images/upload-images/'), $filename);
                        $imagePaths[$imageCategory][] = 'asset/images/upload-images/' . $filename;
                    }
                } else {
                    // Ensure $imagePaths has an empty array for each category to avoid null issues
                    $imagePaths[$imageCategory] = [];
                }
            }

            $order = ServiceNo::create([
                'po_no' => $request->po_no,
                'sn' => $request->sn,
                'date' => now(),
                'created_by' => \Auth::user()->id,
                'address' => $request->address,
                'during_images' => json_encode($imagePaths['during_images']),
                'after_images' => json_encode($imagePaths['after_images']),
                'before_images' => json_encode($imagePaths['before_images']),
                'other_images' => json_encode($imagePaths['other_images']),
                'status' => 'in-progress',
                'geom' => \DB::raw("ST_GeomFromText('POINT(" . $request->coords . ")',4326)")

            ]);
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->route('service-no.index')->with('failed', 'Request Failed');
        }
        return redirect()->route('service-no.index')->with('success', 'Request Success');



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
        $service = ServiceNo::where('id', $id)->first();
        if (!$service) {
            return abort(404);
        }
        $order['service'] = $service;
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
        $service = ServiceNo::where('id', $id)->first();
        if (!$service) {
            return abort(404);
        }
        $order['service'] = $service;
        $order['during_images'] = $order['service']->during_images != '' ? json_decode($order['service']->during_images) : '';
        $order['after_images']  = $order['service']->after_images  != '' ? json_decode($order['service']->after_images)  : '';
        $order['before_images'] = $order['service']->before_images != '' ? json_decode($order['service']->before_images) : '';
        $order['other_images'] = $order['service']->other_images != '' ? json_decode($order['service']->other_images) : '';


        return view('ServiceNo.edit', ['order' => $order]);
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
        $order = ServiceNo::where('id',$id)->first();
        if (!$order) {
            return abort(404);
        }
        $imagePaths = [];
        try
        {
            foreach (['before_images', 'during_images', 'after_images', 'other_images'] as $imageCategory)
            {
                if ($request->hasFile($imageCategory)) {
                    foreach ($request->file($imageCategory) as $file) {
                        $filename = $request->sn .'-'. $imageCategory. '-' .\Str::random(10) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('asset/images/upload-images/'), $filename);
                        $imagePaths[$imageCategory][] = 'asset/images/upload-images/' . $filename;
                    }
                } else {
                    // Ensure $imagePaths has an empty array for each category to avoid null issues
                    $imagePaths[$imageCategory] = json_decode($order->$imageCategory);
                }
            }
            $order = $order->update([
                'address' => $request->address,
                'during_images' => json_encode($imagePaths['during_images']),
                'after_images' => json_encode($imagePaths['after_images']),
                'before_images' => json_encode($imagePaths['before_images']),
                'other_images' => json_encode($imagePaths['other_images']),

            ]);
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->route('service-no.index')->with('failed', 'Request Failed');
        }
        return redirect()->route('service-no.index')->with('success', 'Request Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $serviceNo = ServiceNo::findOrFail($id);

            // Delete associated images from storage
            $imageCategories = ['before_images', 'during_images', 'after_images', 'other_images'];

            foreach ($imageCategories as $imageCategory) {
                if (!empty($serviceNo->$imageCategory)) {
                    // Decode the JSON to get the image paths
                    $images = json_decode($serviceNo->$imageCategory, true);

                    if (is_array($images)) {
                        foreach ($images as $image) {
                            $imagePath = public_path($image);
                            if (File::exists($imagePath)) {
                                File::delete($imagePath);
                            }
                        }
                    }
                }
            }

            // Delete the ServiceNo record from the database
            $serviceNo->delete();
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->route('service-no.index')->with('failed', 'Request Failed');
        }
        return redirect()->route('service-no.index')->with('success', 'Request Success');

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
