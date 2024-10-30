<?php
    require_once 'entities/ImagenGaleria.class.php';
    require_once 'entities/Partner.class.php';

    // IMAGENES GALERÍA
    for ($i=1; $i < 13; $i++) {
        $nombre = $i . ".jpg";
        $descripcion = "descipcion imagen " . $i;
        $numVisualizaciones = rand(0, 10000);
        $numLikes = rand(0, 10000);
        $numDownloads = rand(0, 10000);

        // CREO EL OBJETO (imagenGaleria)
        $imagenesGaleria[] = new imagenGaleria($nombre, $descripcion, $numVisualizaciones, $numLikes, $numDownloads);
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