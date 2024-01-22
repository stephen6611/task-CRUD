<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if(!$request->expectsJson()){
            if($request->routeIs('penduduk.*')){
                session()->flash('fail','Anda harus login dahulu');
                return route('penduduk.login');
        }
    }
}
}
