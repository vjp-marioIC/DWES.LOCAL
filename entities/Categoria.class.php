<?php
    require_once __DIR__. '/../database/IEntity.class.php';

    class Categoria implements IEntity{
        // ATRIBUTOS
        private $id;
        private $nombre;
        private $numImagenes;

        // CONSTRUCTOR PARAMETRIZADO
        public function __construct(string $nombre='', int $numImagenes=0) {
            $this->nombre = $nombre;
            $this->numImagenes = $numImagenes;
        }

        // GETTER Y SETTERS
        public function getId(): int {
            return $this->id;
        }

        public function setId(int $id): void {
            $this->id = $id;
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void {
            $this->nombre = $nombre;
        }

        public function getNumImagenes(): int {
            return $this->numImagenes;
        }

        public function setNumImagenes(int $numImagenes): void {
            $this->numImagenes = $numImagenes;
        }

        // MÉTODO (toArray)
        public function toArray(): array {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'numImagenes' => $this->getNumImagenes()
                
            ];
        }
    }
?>