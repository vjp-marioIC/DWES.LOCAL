<?php
    require_once 'utils/boostrap.php';
    
    $routers = require 'utils/routes.php';
    $uri = trim($_SERVER['REQUEST_URI'], '/');

    require $routers[$uri];

/*
function esOpcionMenuActiva(string $opcionMenu): bool {
        $active = false;
    
        // OBTENGO LA URL ACTUAL
        $uri = $_SERVER['REQUEST_URI'];
    
        // CONDICIÓN ESPECIAL PARA HOME
        if ($opcionMenu === 'index' && ($uri === '/' || $uri === '/index.php')) {
            return true;
        }
    
        // VERIFICO QUE LA OPCIÓN DEL MENÚ ESTÁ EN LA URL
        if (strpos($uri, $opcionMenu) !== false) {
            return true;
        }
    
        return $active;
    }
*/
?>