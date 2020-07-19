<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::channel('request')->info('Request path: ' . $request->path());
        Log::channel('request')->info('Request method: ' . $request->method());
        Log::channel('request')->info('Request body: ' . "\n" . json_encode($request->all(), JSON_PRETTY_PRINT));
        return $next($request);
    }
}
