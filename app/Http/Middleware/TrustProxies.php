<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;

    protected function proxies()
    {
        if(App::environment('heroku')) {
            return '*';
        }

        return $this->proxies;
    }

    protected function getTrustedHeaderNames()
    {
        if(App::environment('heroku')) {
            $this->headers = Request::HEADER_X_FORWARDED_AWS_ELB;
        }

        return parent::getTrustedHeaderNames();
    }
}
