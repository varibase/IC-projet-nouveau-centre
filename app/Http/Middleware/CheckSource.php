<?php

namespace App\Http\Middleware;

use App\Models\Location;
use Closure;

class CheckSource
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
        if(isset($request->query()['source']))
        {
            if(Location::where('shortname', $request->query()['source'])->count()){
                session(['location' => $request->query()['source']]);
            }
        }
        else if(!session()->has('location'))
        {
            session(['location' => 'pvm']);
        }
        return $next($request);
    }
}
