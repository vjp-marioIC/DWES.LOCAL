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