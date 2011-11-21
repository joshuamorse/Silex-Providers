<?php

namespace Jmflava\Provider\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * A quick and dirty service provider to render a PHP array response.
 * 
 * @uses ServiceProviderInterface
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */
class PHPArray implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['php_array_response'] = $app->protect(function (array $data, $status_code = 200) use ($app) {
            return new Response(var_export($data), $status_code);
        });
    }
}
