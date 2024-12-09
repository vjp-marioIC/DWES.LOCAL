<?php
    require_once 'entities/File.class.php';
    require_once 'entities/Partner.class.php';
    require_once 'entities/Connection.class.php';
    require_once 'entities/QueryBuilder.class.php';
    require_once 'exceptions/AppException.class.php';
    require_once 'repository/AsociadosRepository.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    try {
        $asociadosRepository = new AsociadosRepository();

        // ELIMINO LOS ESPACIOS EN BLANCO CON (trim)
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];

        $logo = new File('logo', $tiposAceptados);
        $logo->saveUploadFile(Partner::RUTA_IMAGENES_ASOCIADOS);

        $asociado = new Partner($nombre, $logo->getFileName(), $descripcion);

        $asociadosRepository->guarda($asociado);

        $mensaje = 'Logo guardado';
        App::get('logger')->log->info($mensaje);
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }

    header('Location: /partner');
?>
