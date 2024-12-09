<?php
require_once 'entities/File.class.php';
require_once 'entities/Connection.class.php';
require_once 'entities/QueryBuilder.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'entities/Partner.class.php';
require_once 'repository/AsociadosRepository.class.php';

$errores = [];
$mensaje = '';

try {
    $asociadosRepository = new AsociadosRepository();

    $asociados = $asociadosRepository->findAll();
}
catch (FileException | QueryException | AppException $exception) {
    // Guardo en un array los errores
    $errores[] = $exception->getMessage();
}

// Incluye la vista
require __DIR__ . '/../views/partner.view.php';
?>
