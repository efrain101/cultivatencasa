<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnValue;

class ControlAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*$blockaccess = true;
        if(auth()->user()->tipo_usuario===1)
            $blockaccess=false;

        if($blockaccess)
            return back()->with('message', ['danger', 'No eres administrador!!']);*/

        if(auth()->user()->tipo_usuario!==1)
            //return redirect()->back()->with('message', ['danger', 'No eres administrador!!']);
            return redirect('error');

        return $next($request);
    }
}
