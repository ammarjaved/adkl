<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DownloadReportController extends Controller
{
    //
    public function index($po_no)
    {
       if( File::exists(asset('assets/PurhaseOrderPDF/pdfs/'.$po_no.'.pdf')) ){
            return response()->download(asset('assets/PurhaseOrderPDF/pdfs/'.$po_no.'.pdf'));
       }
    }
}
