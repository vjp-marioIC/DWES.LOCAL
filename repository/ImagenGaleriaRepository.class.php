<?php
    require_once __DIR__ . '/../entities/QueryBuilder.class.php';
    
    class ImagenGaleriaRepository extends QueryBuilder {
        public function __construct(string $table='imagenes', string $classEntity='ImagenGaleria') {
            parent::__construct($table, $classEntity);
        }

        public function getCategoria(ImagenGaleria $imagenGaleria) : Categoria {
            $catgoriaRepository = new CategoriaRepository();

            return $catgoriaRepository->find($imagenGaleria->getCategoria());
        }

        public function guarda(ImagenGaleria $imagenGaleria) {
            $fnGuardaImagen = function () use ($imagenGaleria){
                $categoria = $this->getCategoria($imagenGaleria);
                $categoriaRepository = new CategoriaRepository();
                $categoriaRepository->nuevaImagen($categoria);

                $this->save($imagenGaleria); // Guarda la imagen
            };

            $this->executeTransaction($fnGuardaImagen);
        }
    }
?>