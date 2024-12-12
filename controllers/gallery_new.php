<?php
    use proyecto\exceptions\AppException;
    use proyecto\exceptions\FileException;
    use proyecto\exceptions\QueryException;
    use proyecto\entities\ImagenGaleria;
    use proyecto\entities\File;
    use proyecto\repository\ImagenGaleriaRepository;
    use proyecto\entities\App;

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
        App::get('logger')->crearLog($mensaje);
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }
    
    header('Location: /gallery');
?>