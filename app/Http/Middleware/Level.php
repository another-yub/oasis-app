<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        if(auth()->user()){
            foreach($levels as $level)
            {
                if(auth()->user()->role == $level)
                {
                    return $next($request);
                }
            }
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki akses :)');
    }
}
