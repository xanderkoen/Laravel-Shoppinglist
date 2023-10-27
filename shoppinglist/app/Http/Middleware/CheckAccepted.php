<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccepted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lijst = $request->route('list')->accepted;
        $lijstowner = $request->route('list')->user_id;

        if ($lijst == 1 || auth()->user()->role == 2 || $lijstowner == auth()->user()->id) {
            return $next($request);
        }

        return redirect(route('lists.index'))->with('status', 'Lijst is nog niet gepubliceerd');

    }
}
