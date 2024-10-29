<?php
    require 'utils/utils.php';
    require 'utils/File.class.php';
    require 'entities/ImagenGaleria.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados);

            // El parametro (filename) es 'imagen' por que así se lo indicamos en el
            // formulario (type = "file" name = "imagen")
            $imagen ->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $mensaje = 'Datos enviados';
        }
        catch (FileException $exception) {
            // Guardo en un array los errores
            $errores[] = $exception->getMessage();
        }
    }

    require 'views/gallery.view.php';
?>