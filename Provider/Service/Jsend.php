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
    /**
     * Defines the allowed Jsend statuses. 
     */
    private $allowed_statuses = array('success', 'fail', 'error');

    public function register(Application $app)
    {
        $allowed_statuses = $this->allowed_statuses;

        $app['jsend_response'] = $app->protect(function ($status = null, array $data, $status_code = 200) use ($app, $allowed_statuses) {
            if (!in_array($status, $allowed_statuses)) {
                return new Response(500, sprintf('Jsend only supports the following 3 statuses: %s.',
                    implode(', ', $allowed_statuses)
                ));
            }

            $jsend_data = array(
                'status' => $status,
                'data' => $data,
            );

            return $app['json_response']($jsend_data, $status_code);
        });
    }
}
