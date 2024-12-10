<?php
    use proyecto\repository\MessageRepository;
    use proyecto\entities\Message;

    $erroresValidacion = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ELIMINO LOS ESPACIOS EN BLANCO CON (trim)
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellido = trim(htmlspecialchars($_POST['apellido']));
        $correo = trim(htmlspecialchars($_POST['correo']));
        $asunto = trim(htmlspecialchars($_POST['asunto']));
        $mensajeTexto = trim(htmlspecialchars($_POST['mensaje']));

        if (empty($nombre)) {
            $erroresValidacion[] = 'El campo nombre está vacío.';
        }

        if (empty($correo)) {
            $erroresValidacion[] = 'El campo correo está vacío.';
        } else {
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $erroresValidacion[] = 'Email incorrecto.';
            }
        }

        if (empty($asunto)) {
            $erroresValidacion[] = 'El campo asunto está vacío.';
        }

        $messageRepository = new MessageRepository();

        // SI ($erroresValidacion) ESTÁ VACÍO, GUARO EL MENSAJE EN LA BD
        if (empty($erroresValidacion)) {
            $mensaje = new Message($nombre, $apellido, $asunto, $correo, $mensajeTexto);
            
            $messageRepository->guarda($mensaje);
        }
    }

    header('Location: /contact');
?>