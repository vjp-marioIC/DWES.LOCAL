<?php
    // MÉTODO PARA SABER SI LA OPCIÓN DE LA CABECERA ESTÁ ACTIVA
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

    // MÉTODO PARA COMPROBAR SI ALGUNA OPCIÓN DE UN ARRAY ($arrayOpciones) ESTÁ ACTIVA
    function existeOpcionMenuActivaEnArray($arrayOpciones): bool {
        // RECORRO EL ARRAY DE OPCIONES
        foreach ($arrayOpciones as $opcion) {
            // SI LA OPCIÓN QUE SE LE PASA ES LA ACTIVA SE PONE A TRUE
            if (esOpcionMenuActiva($opcion)) {
                return true;
            }
        }

        return false;
    }

    // FUNCIÓN PARA OBTENER TRES ELEMENTOS ALEATORIOS DE UN ARRAY
    function obtenerTresElementosAleatoriosArray(array $array): array {
        // MEZCLO LOS ELEMENTOS DEL ARRAY
        shuffle($array);

        // OBTENGO TRES ELEMENTOS DESDE LA POSICIÓN (0) DEL ARRAY
        $tresElementos = array_slice($array, 0, 3);

        return $tresElementos;
    }
?>