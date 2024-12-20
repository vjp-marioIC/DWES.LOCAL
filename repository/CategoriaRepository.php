<?php
   namespace proyecto\repository;
   use proyecto\entities\QueryBuilder;
   use proyecto\entities\Categoria;

    class CategoriaRepository extends QueryBuilder {
        // CONSTRUCTOR EN EL QUE SE LE PASA EL NOMBRE DE LA TABLA Y LA CLASE ASOCIADA A ESA TABLA
        public function __construct(string $table='categorias', string $classEntity= Categoria::class) {
            parent::__construct($table, $classEntity);
        }

        // MÉTODO PARA ACTUALIZAR El NÚMERO DE IMAGENES EN LA CATEGORIA CORRESPONDIENTE
        public function nuevaImagen(Categoria $categoria) {
            $categoria->setNumImagenes($categoria->getNumImagenes() + 1);
            $this->update($categoria);
        }
    }
?>