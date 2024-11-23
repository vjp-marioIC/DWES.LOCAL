<?php
    require_once __DIR__ . '/../entities/QueryBuilder.class.php';
    
    class AsociadosRepository extends QueryBuilder {
        // CONSTRUCTOR EN EL QUE SE LE PASA EL NOMBRE DE LA TABLA Y LA CLASE ASOCIADA A ESA TABLA
        public function __construct(string $table='asociados', string $classEntity='Partner') {
            parent::__construct($table, $classEntity);
        }

        // MÉTODO PARA GUARDAR UN ASOCIADO
        public function guarda(Partner $partner) {
            // EL (use) ES PARA PASARLE EL CONTACTO
            $fnGuardaAsociado = function () use ($partner) {
                $this->save($partner); // GUARDA EL ASOCIADO
            };
    
            $this->executeTransaction($fnGuardaAsociado);
        }
    }
?>