<?php
    use proyecto\entities\Message;
    use proyecto\repository\MessageRepository;

    $erroresValidacion = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ELIMINO LOS ESPACIOS EN BLANCO CON (trim)
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

        $messageRepository = new MessageRepository();

        // SI ($erroresValidacion) ESTÁ VACÍO, GUARO EL MENSAJE EN LA BD
        if (empty($erroresValidacion)) {
            $mensaje = new Message($nombre, $apellido, $asunto, $correo, $mensaje);

            $messageRepository->guarda($mensaje);
        }
    }

    require __DIR__. '/../views/contact.view.php';
?>