<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

use Xendit\Xendit;

class XenditMiddleware
{
    // @param Request $request
    // @param Closure (Request) : (\Illuminate\Http\Response|RedirectResponse) $next
    // @return \Illuminate\Http\Response\RedirectResponse

    public function handle($request, Closure $next)
    {
        // Set API key

        // Pass the request to the next middleware

        if(config('xendit.callback_token') == $request->header('XENDIT_CALLBACK_TOKEN')){
        return $next($request);

        }

        abort(403);

    }
}