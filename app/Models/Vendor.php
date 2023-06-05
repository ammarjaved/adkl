<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendor';
    protected $fillable=[
        'user_id',
        'ba',
        'erms_se_no',
        'year',
        'erms_amount',
        'vendor_name',
    ];

    public function PurchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class, 'vendor_id');
    }

    protected static function boot()
    { 
        parent::boot();

        // Disconnect the database connection after each query
        static::retrieved(function ($model) {
            DB::disconnect();
        });
    }
}
