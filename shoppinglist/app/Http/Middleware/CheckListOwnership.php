<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckListOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = auth()->user()->id;

        $list = $request->route('list')->user_id;

        if ($userId == $list) {
            return $next($request);
        }

        if (Auth::user()->role == 2) {
            return redirect(route('home'))->with('error', 'Pas andermans lijsten aan via het adminmenu');
        }
        return redirect(route('home'))->with('error', 'Je hebt geen toegang tot deze lijst.');
    }
}
