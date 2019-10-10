<?php


namespace App\Http\Middleware;


use Illuminate\Support\Facades\App;

class SetLanguageMiddleware
{
    public function handle($request, \Closure $next)
    {
        App::setLocale('id');
        return $next($request);
    }
}