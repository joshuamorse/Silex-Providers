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
            return new Response(json_encode($data), $status_code);
        });
    }
}
