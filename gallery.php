<?php
    require 'utils/utils.php';
    require 'utils/File.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados);

            $mensaje = 'Datos enviados';
        }
        catch (FileException $exception) {
            
            $errores[] = $exception->getMessage();
        }
    }

    require 'views/gallery.view.php';
?>