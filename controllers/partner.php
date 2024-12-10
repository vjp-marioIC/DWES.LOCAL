<?php
use proyecto\exceptions\AppException;
use proyecto\exceptions\FileException;
use proyecto\exceptions\QueryException;
use proyecto\repository\AsociadosRepository;

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
