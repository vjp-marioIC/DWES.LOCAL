<?php
    require_once __DIR__. '/../exceptions/FileException.class.php';

    class File {
        private $file;
        private $fileName;

        public function __construct(string $fileName, array $arrTypes) {
            $this->file = $_FILES[$fileName];
            $this->fileName = '';

            // Comprobamos que es array contiene el fichero
            if (!isset($this->file)) {
                throw new FileException('Debes seleccionar un fichero');
            }

            // Verificamos si ha habido algún error durante la subida del fichero
            if ($this->file['error'] !== UPLOAD_ERR_OK) {
                // Dentro del if verificamos de que tipo ha sido el error
                switch ($this->file['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE: {
                        // Algún problema con el tamaño del fichero (php.ini)
                        throw new FileException('El fichero es demasiado grande');
                        break;
                    }
                    case UPLOAD_ERR_PARTIAL:{
                        // Error en la trsnferencia - subida incompleta
                        throw new FileException('No se ha podido subir el fichero completo');
                        break;
                    }
                    default:{
                        // Error en la subida del fichero
                        throw new FileException('No se ha podido subir el fichero');
                        break;
                    }
                }
            }

            if (in_array($this->file['type'], $arrTypes) === false) {
                // Error, tipo no soportado
                throw new FileException('Tipo de fichero no soportado');
            }
        }

        public function getFileName() {
            return $this->fileName;
        }
    }
?>