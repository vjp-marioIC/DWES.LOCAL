<?php
    require_once 'entities/ImagenGaleria.class.php';

    for ($i=1; $i < 13; $i++) {
        $nombre = $i . ".jpg";
        $descripcion = "descipcion imagen " . $i;
        $numVisualizaciones = rand(0, 10000);
        $numLikes = rand(0, 10000);
        $numDownloads = rand(0, 10000);

        $imagenesGaleria[] = new imagenGaleria($nombre, $descripcion, $numVisualizaciones, $numLikes, $numDownloads);
    }

    require 'views/index.view.php';
?>