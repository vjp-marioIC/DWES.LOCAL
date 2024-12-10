<?php
    use proyecto\exceptions\AppException;
    use proyecto\exceptions\FileException;
    use proyecto\exceptions\QueryException;  
    use proyecto\repository\ImagenGaleriaRepository;
    use proyecto\repository\CategoriaRepository;

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    try {
        $imagenRepository = new ImagenGaleriaRepository();
        $categoriaRepository = new CategoriaRepository();
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    } finally {
        // OBTENGO TODAS LA IMAGENES Y LAS CATEGORIAS
        $imagenes = $imagenRepository->findAll();
        $categorias = $categoriaRepository->findAll();
    }
    
    require __DIR__. '/../views/gallery.view.php';
?>