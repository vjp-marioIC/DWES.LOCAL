<?php
    namespace proyecto\entities;
    use proyecto\database\IEntity;

    class ImagenGaleria implements IEntity {

        // CONSTANTES
        const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
        const RUTA_IMAGENES_GALLERY  = 'images/index/gallery/';

        // ATRIBUTOS
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownloads;
        private $id;
        private $categoria;

        // CONSTRUCTOR PARAMETRIZADO
        public function __construct(string $nombre='', string $descripcion='', int $categoria=0, int $numVisualizaciones = null, int $numLikes = null, int $numDownloads = null) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numVisualizaciones = $numVisualizaciones ?? rand(0, 10000);
            $this->numLikes = $numLikes ?? rand(0, 10000);
            $this->numDownloads = $numDownloads ?? rand(0, 10000);
            $this->id = null;
            $this->categoria = $categoria;
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

        public function getId() {
            return $this->id;
        }

        public function getCategoria(): int
        {
            return $this->categoria;
        }

        public function setCategoria(int $categoria): void
        {
            $this->categoria = $categoria;
        }

        // FUNCIÓN OBTENER URL PORTFOLIO
        public function getUrlPortfolio() : string {
            return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
        }

        // FUNCIÓN OBTENER URL GALLERY
        public function getUrlGallery() : string {
            return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
        }

        // MÉTODO (toArray)
        public function toArray(): array {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'descripcion' => $this->getDescripcion(),
                'numVisualizaciones' => $this->getNumVisualizaciones(),
                'numLikes' => $this->getNumLikes(),
                'numDownloads' => $this->getNumDownloads(),
                'categoria' => $this->getCategoria()
            ];
        }
    }
?>