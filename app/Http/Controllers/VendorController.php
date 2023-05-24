<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Http\Requests\VendorRequest;
use App\Models\PurchaseOrder;
use App\Models\ServiceNo;
use App\Models\User;
use App\Models\Vendor;
use Exception;
use Illuminate\Support\Facades\Hash;
use Mockery\Expectation;

class VendorController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('Vendor')
            ->where('type', 'vendor')
            ->get();

        return view('Vendor.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        //
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'type' => 'vendor',
                'vendor_name' => $request->vendor_name,
                'address' => $request->address,
            ]);

            $vendor = Vendor::create([
                'user_id' => $user->id,
                'ba' => $request->ba,
                'erms_se_no' => $request->erms_se_no,
                'year' => $request->year,
                'erms_amount' => $request->erms_amount,
                'vendor_name' => $request->vendor_name,
            ]);
        } catch (Exception $e) {
            // return redirect()->route('vendor.index')->witth('message','something is worng try again later');
            return $e->getMessage();
        }

        return redirect()->route('vendor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('vendor')->find($id);

       return $user ? view('Vendor.show',['user'=>$user]) : abort(404);
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
        $user = User::with('Vendor')
            ->where('id', $id)
            ->first();

        return $user ? view('Vendor.edit', ['user' => $user]) : abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorRequest $request, $id)
    {
        //

        try {
            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'type' => 'vendor',
                'vendor_name' => $request->vendor_name,
                'address' => $request->address,
            ]);

            $vendor = Vendor::where('user_id', $id)->update([
                'ba' => $request->ba,
                'erms_se_no' => $request->erms_se_no,
                'year' => $request->year,
                'erms_amount' => $request->erms_amount,
                'vendor_name' => $request->vendor_name,
            ]);
        } catch (Exception $e) {
            // return redirect()->route('vendor.index')->witth('message','something is worng try again later');
            return $e->getMessage();
        }

        return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            Vendor::where('user_id',$id)->delete();
            PurchaseOrder::where('user_id',$id)->delete();
            ServiceNo::where('created_by',$id)->delete();
        } catch (Expectation $e) {
            return redirect()
                ->route('vendor.index')
                ->with('message', 'Something is worng try again later');
        }
        return redirect()->route('vendor.index');
    }



    public function getPoByVendor($id)
    {
        $user = User::with('PoDetail')->where('id',$id)->get();

        return response()->json(['data',$user[0]]);
    }
}
