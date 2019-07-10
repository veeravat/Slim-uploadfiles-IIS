<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->post('/add', function (Request $request, Response $response, array $args) use ($container)
    {
        $post = $request->getUploadedFiles();
        echo '<pre>';
        print_r($post);
    });

    $app->get('/info', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        
        // Render index view
        return phpinfo();
    });
    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
};
