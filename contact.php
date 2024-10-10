<?php
    
    $erroresValidacion = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellido = trim(htmlspecialchars($_POST['apellido']));
        $correo = trim(htmlspecialchars($_POST['correo']));
        $asunto = trim(htmlspecialchars($_POST['asunto']));
        $mensaje = trim(htmlspecialchars($_POST['mensaje']));

        if (empty($nombre)) {
            $erroresValidacion [] = 'El campo nombre esta vacio.';
        }

        if (empty($correo)) {
            $erroresValidacion [] = 'El campo correo esta vacio.';
        } else {
            if ((filter_var($correo, FILTER_VALIDATE_EMAIL)) === false) {
                $erroresValidacion [] = 'Email incoorecto';
            }
        }

        if (empty($asunto)) {
            $erroresValidacion [] = 'El campo asunto esta vacio.';
        }

        // ARRAY CON LOS DATOS DEL FORMULARIO
        $datos = [
            'Nombre: ' => $nombre,
            'Apellidos: ' => $apellido,
            'Correo: ' => $correo,
            'Asunto: ' => $asunto,
            'Mensaje: ' => $mensaje
        ];
    }

    require 'views/contact.view.php';
    require 'utils/utils.php';
?>