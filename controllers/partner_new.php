<?php
    use proyecto\exceptions\AppException;
    use proyecto\exceptions\FileException;
    use proyecto\exceptions\QueryException;
    use proyecto\repository\AsociadosRepository;
    use proyecto\entities\Partner;
    use proyecto\entities\File;
    use proyecto\entities\App;

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
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    }

    header('Location: /partner');
?>
