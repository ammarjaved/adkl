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
        '/api/database/GetResults',
        '/api/database/insert',
        '/api/database/update',
        '/api/upload-images',
        '/api/login',
        '/api/genrate-purchase-no-pdf',
        '/api/get-all-service-no',
        '/api/download-purchase-order-report',
        '/api/change-password'
    ];
    
}
