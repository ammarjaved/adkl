<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'address',
        'password',
        'type',
        'vendor_name',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vendor() {
        return $this->hasOne(Vendor::class, 'user_id');
    }

    public function serviceNo() {
        return $this->hasMany(ServiceNo::class, 'created_by');
    }

    public function PoDetail() {
        return $this->hasMany(PurchaseOrder::class, 'user_id');
    }
   
}
