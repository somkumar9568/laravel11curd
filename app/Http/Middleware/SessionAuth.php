<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class SessionAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('user')) {
            return redirect('/login')->with('fail', 'Please login first.');
        }
        return $next($request);
    }
}
