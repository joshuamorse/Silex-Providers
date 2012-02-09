<?php

namespace Jmflava\Provider\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * A quick and dirty service provider to render a JSON response.
 * 
 * @uses ServiceProviderInterface
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */
class JSON implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['json_response'] = $app->protect(function (array $data, $status_code = 200) use ($app) {
            $callback = $app['request']->query->get('callback');
            if ($callback) {
                $callback = preg_replace( "/[^][.\\'\\\"_A-Za-z0-9]/", '', $callback);
                return new Response(
                    sprintf('%s(%s)', $callback, json_encode($data)),
                    $status_code,
                    array('Content-Type' => 'application/javascript')
                );
            }
            return new Response(
                json_encode($data),
                $status_code, 
                array('Content-Type' => 'application/json; charset=utf-8')
            );
        });
    }
}
