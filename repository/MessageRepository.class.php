<?php
    require_once __DIR__ . '/../entities/QueryBuilder.class.php';
    
    class MessageRepository extends QueryBuilder {
        public function __construct(string $table='mensajes', string $classEntity='Message') {
            parent::__construct($table, $classEntity);
        }
    }
?>