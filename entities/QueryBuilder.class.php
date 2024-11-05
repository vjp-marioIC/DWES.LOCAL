<?php
    require_once __DIR__.'/../exceptions/QueryException.class.php';

    class QueryBuilder {
        private $connection;

        public function __construct(PDO $connection) {
            $this->connection = $connection;
        }

        public function findAll(string $table, string $classEntity): array {
            $sql = "SELECT * FROM $table"; // Sentencia SQL a ejecutar

            $pdoStatement = $this -> connection->prepare($sql);

            if ($pdoStatement->execute() === false) {
                throw new QueryException("No se ha podido ejecutar la consulta");
            }

            return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classEntity);
        }
    }
?>