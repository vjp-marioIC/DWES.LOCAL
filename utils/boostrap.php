<?php
    require_once 'entities/App.class.php';
    require_once 'Request.class.php';
    require_once 'Router.class.php';
    require_once __DIR__. '/../exceptions/NotFoundException.class.php';
    require_once 'vendor/autoload.php';
    require_once 'entities/MyLog.class.php';

    $config = require_once __DIR__. '/../app/config.php';
    
    App::bind('config', $config);

    App::bind('router', Router::load('utils/routes.php'));

    App::bind('logger', new MyLog('logs/proyecto.log'));
?>