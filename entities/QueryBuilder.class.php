<?php
    require_once __DIR__. '/../exceptions/QueryException.class.php';
    require_once __DIR__. '/App.class.php';

    abstract class QueryBuilder {
        private $connection;
        private $table;
        private $classEntity;

        public function __construct(string $table, string $classEntity) {
            $this->connection = App::getConnection();
            $this->table = $table;
            $this->classEntity = $classEntity;
        }

        public function save(IEntity $entity) : void {
            try {
                $parameters = $entity->toArray();

                $sql = sprintf('insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(',:', array_keys($parameters)));

                $statement = $this->connection->prepare($sql);
                $statement->execute($parameters);
            } catch (PDOException $exception) {
                throw new QueryException("Error al insetar en la BD");
            }
        }

        public function executeQuery(string $sql) : array {
            $pdoStatement = $this->connection->prepare($sql);

            if ($pdoStatement->execute() === false) {
                throw new QueryException("No se ha podido ejecutar la consulta");
            }

            return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
        }

        public function findAll(): array {
            $sql = "SELECT * FROM $this->table"; // Sentencia SQL a ejecutar

            return $this->executeQuery($sql);
        }

        public function find(int $id): IEntity {
            $sql = "SELECT * FROM $this->table WHERE id=$id"; // Sentencia SQL a ejecutar
            $result = $this->executeQuery($sql);

            // Si resultado esta lleno, muestro la excepción
            if (empty($result)) {
                throw new NotFoundException("No se ha encontrado ningún elemnto con id $id");
            }
            
            return $result[0];
        }
    }
?>