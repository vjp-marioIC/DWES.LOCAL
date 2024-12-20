<?php
    namespace proyecto\repository;
    use proyecto\entities\QueryBuilder;
    use proyecto\entities\Message;
    
    class MessageRepository extends QueryBuilder {
        // CONSTRUCTOR EN EL QUE SE LE PASA EL NOMBRE DE LA TABLA Y LA CLASE ASOCIADA A ESA TABLA
        public function __construct(string $table='mensajes', string $classEntity= Message::class) {
            parent::__construct($table, $classEntity);
        }

        // MÉTODO PARA GUARDAR EL MENSAJE DE EL FORMULARIO DE CONTACTO
        public function guarda(Message $message) {
            // EL (use) ES PARA PASARLE EL MENSAJE
            $fnGuardaMensaje = function () use ($message) {
                $this->save($message); // GUARDA EL MENSAJE
            };
    
            $this->executeTransaction($fnGuardaMensaje);
        }
    }
?>