<?php
    use proyecto\exceptions\AppException;
    use proyecto\exceptions\FileException;
    use proyecto\exceptions\QueryException;
    use proyecto\repository\ImagenGaleriaRepository;
    use proyecto\repository\AsociadosRepository;

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