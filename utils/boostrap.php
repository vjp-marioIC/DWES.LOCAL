<?php
    use proyecto\entities\MyLog;
    use proyecto\entities\App;
    use proyecto\utils\Router;

    require_once 'vendor/autoload.php';

    $config = require_once __DIR__. '/../app/config.php';
    
    App::bind('config', $config);

    App::bind('router', Router::load('utils/routes.php'));

    App::bind('logger', new MyLog('logs/proyecto.log'));
?>