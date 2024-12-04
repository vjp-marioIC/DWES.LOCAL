<?php
    require_once 'utils/boostrap.php';

    try {
        require Router::load('utils/routes.php')->direct(Request::uri(), Request::method());
    } catch (NotFoundException $exception) {
        die($exception->getMessage());
    }
    
?>