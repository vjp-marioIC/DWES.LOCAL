<?php
function getErrorStrings($error) {
    $errorDevuelto = match ($error) {
        'UPLOAD_ERR_OK' => "No hay ningún error.",
        'UPLOAD_ERR_INI_SIZE' => "El fichero es demasiado grande.",
        'UPLOAD_ERR_FORM_SIZE' => "El fichero es demasiado grande.",
        'UPLOAD_ERR_PARTIAL' => "No se ha podido subir el fichero.",
        'UPLOAD_ERR_NO_FILE' => "No se ha encontrado ningún archivo.",
        'UPLOAD_ERR_NO_TMP_DIR' => "No existe el directorio temporal.",
        'UPLOAD_ERR_CANT_WRITE' => "No se puede escribir.",
        'UPLOAD_ERR_EXTENSION' => "Error de extensión de archivo.",
        'FICHERO_NO_SOPORTADO' => "Tipo de fichero no soportado"
    };

    return $errorDevuelto;
}

//define('ERROR_MY_UP_FILE', 9);

//$errorStrings[UPLOAD_ERR_OK] = "No hay ningún error.";
//$errorStrings[UPLOAD_ERR_INI_SIZE] = "El fichero es demasiado grande.";
//$errorStrings[UPLOAD_ERR_FORM_SIZE] = "El fichero es demasiado grande.";
//$errorStrings[UPLOAD_ERR_PARTIAL] = "No se ha podido subir el fichero.";
//$errorStrings[UPLOAD_ERR_NO_FILE] = "No se ha encontrado ningún archivo.";
//$errorStrings[UPLOAD_ERR_NO_TMP_DIR] = "No existe el directorio temporal.";
//$errorStrings[UPLOAD_ERR_CANT_WRITE] = "No se puede escribir.";
//$errorStrings[UPLOAD_ERR_EXTENSION] = "Error de extensión de archivo.";

//define('ERROR_STRINGS', $errorStrings);
?>