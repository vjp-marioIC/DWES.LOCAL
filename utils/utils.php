<?php
    function esOpcionMenuActiva(string $opcionMenu): bool{
        $active = false;

        //OBTENGO LA URL ACTUAL
        $uri = $_SERVER['REQUEST_URI'];

        //VERIFICO QUE LA OPCIÓN DEL MENÚ ES IGUAL A LA DE LA URL
        //SI ES ASI RETORNO TRUE Y SE PONE ACTIVA
        if (strpos($uri, $opcionMenu) !== false) {
            return true;
        }

        return $active;
    }
?>