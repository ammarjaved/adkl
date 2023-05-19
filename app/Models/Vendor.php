<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
