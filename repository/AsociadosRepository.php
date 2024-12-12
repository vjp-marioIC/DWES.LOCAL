<?php
    namespace proyecto\repository;
    use proyecto\entities\QueryBuilder;
    use proyecto\entities\Partner;

    class AsociadosRepository extends QueryBuilder {
        // CONSTRUCTOR EN EL QUE SE LE PASA EL NOMBRE DE LA TABLA Y LA CLASE ASOCIADA A ESA TABLA
        public function __construct(string $table='asociados', string $classEntity= Partner::class) {
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