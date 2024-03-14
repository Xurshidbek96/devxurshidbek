<?php

namespace App\Http\Middleware;

use Closure;
use Browser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Login
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

        $user = auth()->user() ? auth()->user()->name : 'guest';

        $browser = $request->header('User-Agent');
        $browser = Browser::browserFamily();


        DB::table('logins')->insert([
            'ip' => $request->ip(),
            'user_agent' => $browser,
            'user_id' => $user,
            'url' => $request->path(),
            'login_at' => now()
        ]);

        return $next($request);
    }
}
