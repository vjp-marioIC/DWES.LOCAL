<?php
    require_once 'entities/App.class.php';

    $config = require_once __DIR__. '/../app/config.php';
    App::bind('config', $config);
?>