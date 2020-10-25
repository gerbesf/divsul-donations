<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        \Carbon\Carbon::setLocale('pt_BR');

        if( !session()->has('locale') )
        {
            \App::setlocale( config()->get('app.locale') );
            session()->put('locale',config()->get('app.locale'));
        }

        if( session()->has('locale') )
        {
            \App::setlocale(session()->get('locale'));
        }
        return $next($request);
    }
}
