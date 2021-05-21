<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConvertResponseFieldsToCamelCase
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
        $content = $response->getContent();

        try {
            $json = json_decode($content, true);
            $replaced = $this->_convertToCamelCase($json);
            $response->setContent(json_encode($replaced));
        } catch (\Exception $e) {
            // you can log an error here if you want
            error_log($e);
        }

        return $response;
    }

    public function _convertToCamelCase($response)
    {
        if (is_array($response)) {
            $replaced = [];
            foreach ($response as $key => $value) {
                $replaced[Str::camel($key)] = $this->_convertToCamelCase($value);
            }
            return $replaced;
        } else {
            return $response;
        }
    }
}
