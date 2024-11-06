<?php
    require_once __DIR__ . '/../entities/QueryBuilder.class.php';
    
    class ImagenGaleriaRepository extends QueryBuilder {
        public function __construct(string $table='imagenes', string $classEntity='ImagenGaleria') {
            parent::__construct($table, $classEntity);
        }
    }
?>