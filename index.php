<?php
    require_once 'entities/ImagenGaleria.class.php';
    require_once 'entities/Partner.class.php';
    require_once 'entities/Connection.class.php';
    require_once 'repository/ImagenGaleriaRepository.class.php';

    // IMAGENES GALERÍA
    try {
        $config = require_once 'app/config.php';

        // Guardamos la configuración en el contenedor de servicios:
        App::bind('config', $config);
        
        $imagenRepository = new ImagenGaleriaRepository();
        // OBTENGO TODAS LA IMAGENES
        $imagenesGaleria = $imagenRepository->findAll();
    }
    catch (QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }

    // ASOCIADOS
    for ($i = 1; $i <= 4; $i++) {
        $nombre = $i . '.jpg';
        $logo = 'log' . $i . '.jpg';
        $descripcion = 'descripción ' . $i;

        // CREO EL OBJETO (Partner))
        $asociados[] = new  Partner($nombre, $logo, $descripcion);
    }

    require 'views/index.view.php';
?>