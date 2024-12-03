<?php
    require_once 'utils/boostrap.php';
    
    $routers = require 'utils/routes.php';
    $uri = trim($_SERVER['REQUEST_URI'], '/');

    require $routers[$uri];
?>