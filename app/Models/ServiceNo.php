<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceNo extends Model
{
    use HasFactory;
    public $table ="service_no_details";
    public $timestamps = false;
    public $fillable =[
        'po_no',
        'address',
        'after_image_2',
        'after_image_1',
        'during_image_2',
        'during_image_1',
        'before_image_2',
        'before_image_1',
        'created_by',
        'geom',
        'date',
        'sn',
        'before_images',
        'during_images',
        'after_images'
    ];

    public function poDetail()
    {
        return $this->belongsTo(PurchaseOrder::class, 'po_number', 'po_no');
    }
}
