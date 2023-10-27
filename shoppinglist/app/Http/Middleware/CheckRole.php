<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role == 2) {
            return $next($request);
        }

        return redirect(route('home'))->with('error', 'Je hebt geen toegang tot deze pagina.'); // Je kunt een andere URL opgeven waar je de gebruiker naartoe wilt sturen als de controle niet slaagt.
    }
}
