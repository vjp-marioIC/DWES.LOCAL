<?php
    require_once 'entities/App.class.php';
    require_once 'Request.class.php';
    require_once 'Router.class.php';
    require_once __DIR__. '/../exceptions/NotFoundException.class.php';

    $config = require_once __DIR__. '/../app/config.php';
    App::bind('config', $config);
?>