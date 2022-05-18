<?php

namespace App\Http\Middleware;

use App\Models\ResponseModel;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $response = new ResponseModel();
            $response->status_code = 0;
            $response->message = "error";
            $response->data = 'Unauthorized';
            abort(response()->json($response));
        }
    }
}
