<?php
    require 'entities/File.class.php';
    require 'entities/ImagenGaleria.class.php';
    require 'entities/Connection.class.php';
    require 'entities/QueryBuilder.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    try {
        $connection = Connection::make();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            // Tipología MIME 'tipodearchivo/extension'
            $imagen = new File('imagen', $tiposAceptados);

            // El parametro (filename) es 'imagen' por que así se lo indicamos en el
            // formulario (type = "file" name = "imagen")
            $imagen ->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
            
            $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
            $pdoStatement = $connection -> prepare($sql); // Preparamos la consulta
            $parametros = [':nombre' => $imagen -> getFileName(), ':descripcion' => $descripcion];

            if ($pdoStatement -> execute($parametros) === false) { // La ejecutamos con los parametros
                $errores[] = "No se ha podido guardar la imagen en la BD";
            } else {
                $descripcion = ''; // Reinicio la variable para que no aparezca relleno en el formulario
                $mensaje = "Imagen guardada";
            }
        }
        $queryBuilder = new QueryBuilder($connection);
        $imagenes = $queryBuilder->findAll('imagenes', 'ImagenGaleria');
    }
    catch (FileException | QueryException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }
    
    require 'views/gallery.view.php';
?>