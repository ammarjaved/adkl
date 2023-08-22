<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://adklservice.com/api/database/GetResults',
        'http://adklservice.com/api/database/insert',
        'http://adklservice.com/api/database/update',
        'http://adklservice.com/api/upload-images',
        'http://adklservice.com/api/login',
        'http://adklservice.com/api/genrate-purchase-no-pdf',
        'http://adklservice.com/api/get-all-service-no',
        'http://adklservice.com/api/download-purchase-order-report',
        'http://adklservice.com/api/change-password'
    ];
    
}
