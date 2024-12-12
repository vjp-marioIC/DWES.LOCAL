<?php
    namespace proyecto\entities;
    use proyecto\exceptions\FileException;
    
    require_once 'utils/const.php';

    class File {
        // ATRIBUTOS
        private $file;
        private $fileName;

        // CONSTRUCTOR
        public function __construct(string $fileName, array $arrTypes) {
            // OBTENGO EL FICHERO SUBIDO DESDE EL INPUT
            $this->file = $_FILES[$fileName];
            $this->fileName = '';

            // VERIFICO SI EL FICHERO HA SIDO SELECCIONADO
            if (empty($this->file['name'])) {
                throw new FileException(getErrorStrings("FICHERO_NO_SELECCIONADO"));
            }

            // VERIFICO SI HUBO ALGÚN ERROR DURANTE LA SUBIDA DEL FICHERO
            if ($this->file['error'] !== UPLOAD_ERR_OK) {
                throw new FileException(getErrorStrings($this->file['error']));
            }

            // VERIFICO SI EL TIPO DE FICHERO ESTÁ EN LA LISTA DE TIPOS PERMITIDOS
            if (in_array($this->file['type'], $arrTypes) === false) {
                throw new FileException(getErrorStrings("FICHERO_NO_SOPORTADO"));
            }
        }

        // MÉTODO PARA OBTENER EL NOMBRE DEL FICHERO.
        public function getFileName() {
            return $this->fileName;
        }

        // MÉTODO PARA GUARDAR EL FICHERO SUBIDO EN (rutaDestino)
        public function saveUploadFile(string $rutaDestino) {
            // VERIFICO QUE EL FICHERO ES SUBIDO POR LA PETICIÓN POST
            if (is_uploaded_file($this->file['tmp_name']) === false) {
                throw new FileException(getErrorStrings("ARCHIVO_NO_PUEDE_SUBIR_FORMULARIO"));
            }

            // OBTENGO EL NOMBRE DEL FICHERO ORIGINAL Y LO CONCATENO CON LA (rutaDestino)
            $this->fileName = $this->file['name'];
            $ruta = $rutaDestino . $this->fileName;

            $contador = 0;
            // COMPRUEBO SI EXISTE UN FICHERO CON EL MISMO NOMBRE EN (rutaDestino)
            // SI EXISTE, GENERO UN NUEVO CONCATENANDO EL NOMBRE + EL INCREMENTO DEL CONTADOR
            if (is_file($ruta) == true) {
                $contador++;
                
                $troceado = explode(".", $this->fileName);
                $this->fileName = $troceado[0] . "(" . $contador . ")." . $troceado[1];

                // ACTUALIZO LA (ruta) CON EL NUEVO NOMBRE
                $ruta = $rutaDestino . $this->fileName;

                // SE REPITE MIENTRAS EXISTA UN FICHERO CON EL MISMO NOMBRE
                while (is_file($rutaDestino . $this->fileName) == true) {
                    $contador++;
                    $this->fileName = $troceado[0] . "(" . $contador . ")." . $troceado[1];

                    $ruta = $rutaDestino . $this->fileName;
                }
            }

            // MUEVO EL FICHERO DESDE EL DIRECTORIO TEMPORAL HASTA LA RUTA DESTINO
            if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
                // Devuelve false si no se ha podido mover
                throw new FileException(getErrorStrings("FICHERO_NO_PUEDE_MOVER_DESTINO"));
            }
        }
        
        // MÉTODO PARA COPIAR EL FICHERO DESDE (rutaOrigen) A (rutaDestino)
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