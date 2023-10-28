<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCommentCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $commentCount = $user->comments->count();

        if ($commentCount >= 5 || $user->role == 2) {
            return $next($request);
        }

        $count = 5 - $commentCount;

        return redirect(route('lists.index'))->with('status', "post eerst nog $count comments voordat je een lijst kan aanmaken");

    }
}
