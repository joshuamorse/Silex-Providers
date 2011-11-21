<?php

namespace Jmflava\Provider\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;
use Jmflava\Provider\Service\JSON;

/**
 * A quick and dirty service provider to render a Jsend-standard JSON response.
 * 
 * @uses ServiceProviderInterface
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */
class Jsend implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['jsend_response'] = $app->protect(function ($status = null, array $data, $status_code = 200) use ($app) {
            $jsend_data = array(
                'status' => $status,
                'data' => $data,
            );

            return $app['json_response']($jsend_data, $status_code);
        });
    }
}
