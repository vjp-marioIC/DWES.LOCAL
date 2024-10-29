<?php
    class Partner {

        // ATRIBUTOS
        private $nombre;
        private $logo;
        private $descripcion;

        // CONSTRUCTOR PARAMETRIZADO
        public function __construct(string $nombre, string $logo, string $descripcion) {
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->descripcion = $descripcion;
        }
    }
?>