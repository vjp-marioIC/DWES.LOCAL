<?php
    // MÉTODO PARA SABER SI LA OPCIÓN DE LA CABECERA ESTÁ ACTIVA
    function esOpcionMenuActiva(string $opcionMenu): bool{
        $active = false;

        //OBTENGO LA URL ACTUAL
        $uri = $_SERVER['PHP_SELF'];

        //VERIFICO QUE LA OPCIÓN DEL MENÚ ES IGUAL A LA DE LA URL
        //SI ES ASI RETORNO TRUE Y SE PONE ACTIVA
        if (strpos($uri, $opcionMenu) !== false) {
            return true;
        }

        return $active;
    }

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