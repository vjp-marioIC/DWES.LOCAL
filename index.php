<?php
    require_once 'utils/boostrap.php';

    try {
        require App::get('router')->direct(Request::uri(), Request::method());
    } catch (NotFoundException $exception) {
        die($exception->getMessage());
    }  
?>