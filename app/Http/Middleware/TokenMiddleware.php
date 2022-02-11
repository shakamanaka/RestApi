<?php

namespace App\Http\Middleware;

use Closure;

class TokenMiddleware
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
        $headers = $request->headers->all();
        $token = env('x_api_key');
        
        if(!$token){
            $response = $next($request);
            return $response;    
        }
        
        if(array_key_exists('x-api-key',$headers)){
            if($token == $headers['x-api-key'][0]){
                $response = $next($request);
                return $response; 
            } else{
                return response()->json(['message' => 'Forbidden'], 403);
            }
        }else{
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
