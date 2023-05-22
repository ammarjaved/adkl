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
        $data['po'] = ServiceNo::all();

        return view('index', ['data' => $data]);
    }
}
