<?php
    require_once __DIR__ . '/../entities/QueryBuilder.class.php';
    
    class ImagenGaleriaRepository extends QueryBuilder {
        // CONSTRUCTOR EN EL QUE SE LE PASA EL NOMBRE DE LA TABLA Y LA CLASE ASOCIADA A ESA TABLA
        public function __construct(string $table='imagenes', string $classEntity='ImagenGaleria') {
            parent::__construct($table, $classEntity);
        }

        // MÉTODO PARA OBTENER LA CATEGORÍA ASOCIADA A UNA IMG DE GALERÍA
        public function getCategoria(ImagenGaleria $imagenGaleria) : Categoria {
            $catgoriaRepository = new CategoriaRepository();

            // CON EL (find) BUSCO Y RETORNO LA CAETGORIA ASOCIADA A LA IMG
            return $catgoriaRepository->find($imagenGaleria->getCategoria());
        }

        // MÉTODO PARA GUARDAR UNA IMG EN LA GALERÍA
        public function guarda(ImagenGaleria $imagenGaleria) {
            // EL (use) ES PARA PASARLE LA IMG
            $fnGuardaImagen = function () use ($imagenGaleria) {
                $categoria = $this->getCategoria($imagenGaleria);
                $categoriaRepository = new CategoriaRepository();
                $categoriaRepository->nuevaImagen($categoria);

                $this->save($imagenGaleria); // GUARDA LA IMG
            };

            $this->executeTransaction($fnGuardaImagen);
        }
    }
?>