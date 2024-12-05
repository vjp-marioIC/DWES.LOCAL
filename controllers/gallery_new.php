<?php
    require_once 'entities/File.class.php';
    require_once 'entities/ImagenGaleria.class.php';
    require_once 'entities/Connection.class.php';
    require_once 'entities/QueryBuilder.class.php';
    require_once 'exceptions/AppException.class.php';
    require_once 'repository/ImagenGaleriaRepository.class.php';
    require_once 'repository/CategoriaRepository.class.php';
    require_once 'entities/Categoria.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    try {
        $imagenRepository = new ImagenGaleriaRepository();

        // ELIMINO LOS ESPACIOS EN BLANCO CON (trim)
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            
        $imagen = new File('imagen', $tiposAceptados);

        $imagen ->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
            
        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria); 
        $imagenRepository->guarda($imagenGaleria);
    
        $descripcion = '';
        $mensaje = 'Imagen guardada';
        App::get('logger')->log->info($mensaje);
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }
    
    header('Location: /gallery');
?>