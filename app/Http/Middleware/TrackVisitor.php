<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika pengunjung belum tercatat pada hari ini dan belum memiliki cookie 'visited_today'
        if (!Session::has('visitor_tracked') && !$request->cookies->has('visited_today')) {
            // Ambil IP pengunjung
            $ip = $request->ip();
            \Log::info('Visitor IP: ' . $ip);

            // Buat catatan baru untuk setiap kunjungan
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $request->userAgent(),
                'page_visited' => $request->path()
            ]);

            // Tandai pengunjung ini sudah tercatat dalam session dan beri cookie
            Session::put('visitor_tracked', true);
            cookie()->queue('visited_today', true, 1440); // Cookie berlaku selama 24 jam
        }

        return $next($request);
    }
}
