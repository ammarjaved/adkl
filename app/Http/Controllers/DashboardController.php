<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\ServiceNo;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data = [];
        $data['count'] = DB::select("SELECT a.total_vendor ,b.total_po ,c.today_po FROM
        (SELECT count(*) total_vendor from users where type = 'vendor') a,
        (SELECT count(*) total_po from service_no_details ) b,
        (select count(*) today_po from service_no_details where date::date < now()::date )c");
        $data['vendor'] = User::where('type', 'vendor')->get();
        $data['po'] = PurchaseOrder::count();
        $data['chart'] = User::select('name')
            ->withCount(['PoDetail', 'serviceNo'])
            ->where('type', 'vendor')
            ->get();

        //   return $data;
        DB::disconnect();
        return view('index', ['data' => $data]);
    }

    public function getBA($id)
    {
       $service = PurchaseOrder::where('user_id',$id)->distinct('ba')->get();
       return response()->json([$service]);
    }

    public function getData($vendor, $ba)
    {
        $data = "";
        if($vendor == 0 && $ba == 0){
            $data = PurchaseOrder::with('user')->get();
        }elseif ($vendor == 0 ) {
            $data=  PurchaseOrder::where('ba',$ba)->with('user')->get();
        }elseif ($ba == 0) {
            $data=  PurchaseOrder::where('user_id',$vendor)->with('user')->get();
        }else {
        $data = PurchaseOrder::where('ba',$ba)->where('user_id',$vendor)->with('user')->get();
        }
        return response()->json([$data]);
    }
}
