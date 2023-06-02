<?php

namespace App\Http\Middleware;

use App\Models\Jabatan;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class CheckJabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$jabatans)
    {
        $jabatans = empty($jabatans) ? [null] : $jabatans;
        // if (env('APP_ENV') === 'testing') {
        //     return $next($request);
        // }
        foreach ($jabatans as $jabatan) {
            if ($request->user()->hasJabatan($jabatan)) {
                return $next($request);
            }
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
