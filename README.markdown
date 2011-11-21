Silex Providers
===============

A random collection of Silex providers that I've written for various uses.



Installation
------------

Register the Jmflava vendor dir in your `autoload.php` file:


        $loader->registerNamespaces(array(
            ...
            'Jmflava'                => __DIR__.'/vendor',
            ...
        ));


Note: make sure you're including `autoload.php` in your app file. It should look something like this:


        require_once __DIR__.'/../silex.phar'; 
        require_once __DIR__.'/../autoload.php'; 



Example Usage
-------------

- Returning a PHP array response:


        $app['php_array_response'](array('foo' => 'bar), 200);


- Returning a JSON response:


        $app['json_response'](array('foo' => 'bar), 200);


- Returning a Jsend (http://labs.omniti.com/labs/jsend) response:


        $app['jsend_response']('success', array('foo' => 'bar), 200);
