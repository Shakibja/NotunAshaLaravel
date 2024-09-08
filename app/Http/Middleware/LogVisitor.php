<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
    
        $visitedToday = DB::table('visitors')
                          ->where('ip_address', $ip)
                          ->whereDate('visited_at', Carbon::today())
                          ->count();
    
        if (!$visitedToday) {
            DB::table('visitors')->insert([
                'ip_address' => $ip,
                'visited_at' => Carbon::today(),
            ]);
        }
    
        return $next($request);
    }
    
}
