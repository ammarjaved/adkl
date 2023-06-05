<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PurchaseOrder extends Model
{
    use HasFactory;
    public $table = 'po_details';
    public $fillable = ['vendor_id', 'po_number', 'user_id', 'po_number', 'erms_amount', 'erms_se_no', 'ba', 'vendor_no','status','year','report'];
    // public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function service_no()
    {
        return $this->hasMany(ServiceNo::class, 'po_no', 'po_number');
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
