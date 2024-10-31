<?php
    require_once __DIR__. '/../exceptions/FileException.class.php';
    require_once __DIR__. '/../utils/const.php';

    class File {
        private $file;
        private $fileName;

        public function __construct(string $fileName, array $arrTypes) {
            $this->file = $_FILES[$fileName];
            $this->fileName = '';

            // Comprobamos que es array contiene el fichero
            if (empty($this->file['name'])) {
                throw new FileException(getErrorStrings("FICHERO_NO_SELECCIONADO"));
            }

            // Verificamos si ha habido algún error durante la subida del fichero
            if ($this->file['error'] !== UPLOAD_ERR_OK) {
                throw new FileException(getErrorStrings($this->file['error']));
            }

            if (in_array($this->file['type'], $arrTypes) === false) {
                // Error, tipo no soportado
                throw new FileException(getErrorStrings("FICHERO_NO_SOPORTADO"));
            }
        }

        public function getFileName() {
            return $this->fileName;
        }

        public function saveUploadFile(string $rutaDestino) {
            // Comprueo que el fichero temporal con el que vamos a trabajar se
            // haya subido previamente por peticioón Post
            if (is_uploaded_file($this->file['tmp_name']) === false) {
                throw new FileException(getErrorStrings("ARCHIVO_NO_PUEDE_SUBIR_FORMULARIO"));
            }

            // Cargamos el nombre del fichero
            $this->fileName = $this->file['name']; // Nombre original del fichero cuando se subió
            $ruta = $rutaDestino . $this->fileName; // Concateno la (rutaDestino) con el nombre del fichero

            $contador = 0;
            // Comprobamos que la ruta no se corresponda con un fichero que ya exista
            if (is_file($ruta) == true) {
                $contador++;
                // No sobreescribo, si no que genero uno nuevo añadiendo la fecha y la hora actual
                $troceado = explode(".", $this->fileName);
                
                $this->fileName = $troceado[0] . "(" . $contador . ")." . $troceado[1];

                $ruta = $rutaDestino . $this->fileName; // Actualizar la variable ruta con el nuevo nombre

                while (is_file($rutaDestino . $this->fileName) == true) {
                    $contador++;
                    $this->fileName = $troceado[0] . "(" . $contador . ")." . $troceado[1];

                    $ruta = $rutaDestino . $this->fileName; // Actualizar la variable ruta con el nuevo nombre
                }
            }

            // Muevo el fichero subido del directorio temporal (viene definido en php.ini)
            if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
                // Devuelve false si no se ha podido mover
                throw new FileException(getErrorStrings("FICHERO_NO_PUEDE_MOVER_DESTINO"));
            }
        }

        public function copyFile(string $rutaOrigen, string $rutaDestino) {
            $origen = $rutaOrigen . $this->fileName;
            $destino = $rutaDestino . $this->fileName;

            if (is_file(($origen) === false)) {
                throw new FileException("No existe el fichero " . $origen . " que intentas copiar.");
            }

            if (is_file(($destino) === true)) {
                throw new FileException("El fichero " . $destino . " ya existe y no puedes sobreescribirlo.");
            }

            if (copy($origen, $destino) === false) {
                throw new FileException("No se ha podido copiar el fichero " . $origen . " a " . $destino);
            }
        }
    }
?>