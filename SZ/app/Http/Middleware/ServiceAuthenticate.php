<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class ServiceAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // BASIC AUTH
        $user = @$request->server("PHP_AUTH_USER");
        $password = @$request->server("PHP_AUTH_PW");
        if( !(isset( config("auth.api_users")[$user] )  &&  config("auth.api_users")[$user] == $password )){
            // We have to show the auth error
            $response = new \App\Classes\Response();
            $response->setError(401,'Not Authorized');
            return response($response->getResponse(), 401)->header('Content-Type', $response->getResponseType());
        }
        return $next($request);
    }
}
