<?php
    use proyecto\utils\Request;
    use proyecto\utils\Router;
    use proyecto\exceptions\NotFoundException;

    require 'utils/boostrap.php';

    try {
        require Router::load('app/routes.php')->direct(Request::uri(), Request::method());
    } catch (NotFoundException $exception) {
        die($exception->getMessage());
    }  
?>