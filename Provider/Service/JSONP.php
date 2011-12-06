<?php

namespace Jmflava\Provider\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * A solution for rendering JSONP responses.
 * 
 * @uses ServiceProviderInterface
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */
class JSONP implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['jsonp_response'] = $app->protect(function (array $data, $status_code = 200, $callback) use ($app) {
            return new Response(
                sprintf('%s(%s)', $callback, json_encode($data))
            , $status_code);
        });
    }
}
