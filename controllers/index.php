<?php
    require_once 'entities/ImagenGaleria.class.php';
    require_once 'entities/Partner.class.php';
    require_once 'entities/Connection.class.php';
    require_once 'repository/ImagenGaleriaRepository.class.php';
    require_once 'repository/AsociadosRepository.class.php';

    // IMAGENES GALERÍA
    try {
        $imagenRepository = new ImagenGaleriaRepository();
        // OBTENGO TODAS LA IMAGENES
        $imagenesGaleria = $imagenRepository->findAll();
    }
    catch (QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }

    // ASOCIADOS
    try {
        $asociadosRepository = new AsociadosRepository();

        // OBTENGO TODAS LA IMAGENES DE LOS ASOCIADOS
        $asociados = $asociadosRepository->findAll();
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }

    require __DIR__. '/../views/index.view.php';
?>