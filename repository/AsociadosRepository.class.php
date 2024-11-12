<?php
    require_once __DIR__ . '/../entities/QueryBuilder.class.php';
    
    class AsociadosRepository extends QueryBuilder {
        public function __construct(string $table='asociados', string $classEntity='Partner') {
            parent::__construct($table, $classEntity);
        }
    }
?>