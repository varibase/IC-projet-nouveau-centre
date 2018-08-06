<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(isset($request->query()['lang']))
        {
            if($request->query()['lang'] == 'en' || $request->query()['lang'] == 'fr'){
                \App::setLocale($request->query()['lang']);
                session(['lang' => $request->query()['lang']]);
            }
        }
        else if(session()->has('lang'))
        {
            \App::setLocale(session('lang'));
        }
        return $next($request);
    }
}
