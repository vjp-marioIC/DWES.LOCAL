<?php
    require_once 'entities/File.class.php';
    require_once 'entities/Connection.class.php';
    require_once 'entities/QueryBuilder.class.php';
    require_once 'exceptions/AppException.class.php';
    require_once 'entities/Partner.class.php';
    require_once 'repository/AsociadosRepository.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    try {
        $config = require_once 'app/config.php';
        
        // Guardamos la configuración en el contenedor de servicios:
        App::bind('config', $config);
        
        //$queryBuilder = new QueryBuilder('imagenes', 'ImagenGaleria');
        $asociadosRepository = new AsociadosRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim(htmlspecialchars($_POST['nombre']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            // Tipología MIME 'tipodearchivo/extension'
            $logo = new File('logo', $tiposAceptados);

            // El parametro (filename) es 'imagen' por que así se lo indicamos en el
            // formulario (type = "file" name = "imagen")
            $logo ->saveUploadFile(Partner::RUTA_IMAGENES_ASOCIADOS);
            
            $asociado = new Partner($nombre, $logo->getFileName(), $descripcion);
            $asociadosRepository->save($asociado);
            $descripcion = ''; // Reinicio la variable para que no aparezca relleno en el formulario
            $mensaje = "Logo guardado";
        }
    }
    catch (FileException | QueryException | AppException $exception) {
        // Guardo en un array los errores
        $errores[] = $exception->getMessage();
    } finally {
        // OBTENGO TODAS LA IMAGENES Y LAS CATEGORIAS
        $asociados = $asociadosRepository->findAll();
    }

    require 'views/partner.view.php';
?>