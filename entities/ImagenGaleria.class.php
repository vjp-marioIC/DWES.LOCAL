<?php
    class ImagenGaleria {

        const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
        const RUTA_IMAGENES_GALLERY  = 'images/index/gallery/';

        // ATRIBUTOS
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownloads;

        // CONSTRUCTOR PARAMETRIZADO
        public function __construct(string $nombre, string $descripcion, int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numVisualizaciones = $numVisualizaciones;
            $this->numLikes = $numLikes;
            $this->numDownloads = $numDownloads;
        }

        // GETTERS Y SETTERS
        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void
        {
            $this->nombre = $nombre;
        }

        public function getDescripcion(): string
        {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): void
        {
            $this->descripcion = $descripcion;
        }

        public function getNumVisualizaciones(): int
        {
            return $this->numVisualizaciones;
        }

        public function setNumVisualizaciones(int $numVisualizaciones): void
        {
            $this->numVisualizaciones = $numVisualizaciones;
        }

        public function getNumLikes(): int
        {
            return $this->numLikes;
        }

        public function setNumLikes(int $numLikes): void
        {
            $this->numLikes = $numLikes;
        }

        public function getNumDownloads(): int
        {
            return $this->numDownloads;
        }

        public function setNumDownloads(int $numDownloads): void
        {
            $this->numDownloads = $numDownloads;
        }

        // FUNCIÓN OBTENER URL PORTFOLIO
        public function getUrlPortfolio() : string {
            return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
        }

        // FUNCIÓN OBTENER URL GALLERY
        public function getUrlGallery() : string {
            return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
        }
    }
?>