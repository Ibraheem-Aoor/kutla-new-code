<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return $next($request);
        }

        if (auth()->check()) {
            if ($request->has('lang')) {
                auth()->user()->update(['lang' => $request->lang]);
            }
            $lang = auth()->user()->lang ?? 'en';
        } else {
            if ($request->has('lang')) {
                session(['lang' => $request->lang]);
            }
            $lang =  session('lang') ?? 'en';
        }

        app()->setLocale($lang);

        return $next($request);
    }
}
