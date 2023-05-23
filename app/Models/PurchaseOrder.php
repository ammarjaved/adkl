<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    public $table ="po_details";
    public $fillable =[
        'vendor_id' ,
                'po_number'
    ];
    // public $timestamps = false;

    public function service_no() {

        return $this->hasOne(ServiceNo::class, 'po_no');
    }
}
