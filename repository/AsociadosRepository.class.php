<?php
    require_once __DIR__ . '/../entities/QueryBuilder.class.php';
    
    class AsociadosRepository extends QueryBuilder {
        public function __construct(string $table='asociados', string $classEntity='Partner') {
            parent::__construct($table, $classEntity);
        }

        public function guarda(Partner $partner) {
            $fnGuardaAsociado = function () use ($partner) {
                $this->save($partner); // GUARDA EL ASOCIADO
            };
    
            $this->executeTransaction($fnGuardaAsociado);
        }
    }
?>