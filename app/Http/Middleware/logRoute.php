<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class logRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if(app()->environment('local')){
            $log=[
              'URL'=>$request->getUri(),
              'METHOD'=>$request->getMethod(),
              'BODY'=>$request->all(),
              'RESPONSE' => $response->getContent(),
              'IP' => $request->ip(),
              'User' => Auth::user()->getAuthIdentifier()
            ];
            Log::info(json_encode($log));
        }
        return $response;
    }
}
