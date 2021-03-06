<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    const CHANNEL = 'request';

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            Log::channel(self::CHANNEL)->info('Request path: ' . $request->path());
            Log::channel(self::CHANNEL)->info('Request method: ' . $request->method());
            Log::channel(self::CHANNEL)->info('Request body: ' . "\n" . json_encode($request->all(), JSON_PRETTY_PRINT));
        } catch (\Exception $e) {
            //Still empty. Ignore write errors if no free disk space for example
        }
        return $next($request);
    }
}
