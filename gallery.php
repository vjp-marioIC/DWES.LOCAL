<?php
    require 'entities/File.class.php';
    require 'entities/ImagenGaleria.class.php';
    require 'entities/Connection.class.php';
    require 'entities/QueryBuilder.class.php';
    require_once 'exceptions/AppException.class.php';
    require 'repository/ImagenGaleriaRepository.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    try {
        $config = require_once 'app/config.php';
        
        // Guardamos la configuración en el contenedor de servicios:
        App::bind('config', $config);
        
        //$queryBuilder = new QueryBuilder('imagenes', 'ImagenGaleria');
        $imagenRepository = new ImagenGaleriaRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            // Tipología MIME 'tipodearchivo/extension'
            $imagen = new File('imagen', $tiposAceptados);

            // El parametro (filename) es 'imagen' por que así se lo indicamos en el
            // formulario (type = "file" name = "imagen")
            $imagen ->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
            
            $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion);
            $imagenRepository->save($imagenGaleria);
            $descripcion = ''; // Reinicio la variable para que no aparezca relleno en el formulario
            $mensaje = "Imagen guardada";
        }
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    } finally {
        $imagenes = $imagenRepository->findAll();
    }
    
    require 'views/gallery.view.php';
?>