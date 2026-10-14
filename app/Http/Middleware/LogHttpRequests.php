<?php

namespace App\Http\Middleware;

use App\Models\HttpLog;
use Closure;

class LogHttpRequests
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);

        $response = $next($request);

        $responseTime = round((microtime(true) - $startTime) * 1000, 2);

        $requestData = [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'status_code' => $response->status(),
            'request_body' => json_encode($request->all()),
            'response_time' => $responseTime,
            'ip' => $request->ip(),
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        HttpLog::query()->create($requestData);

        return $response;
    }
}
