<?php
    require_once __DIR__. '/../exceptions/QueryException.class.php';
    require_once __DIR__. '/App.class.php';

    abstract class QueryBuilder {
        // ATRIBUTOS
        private $connection;
        private $table;
        private $classEntity;

        // CONSTRUCTOR
        public function __construct(string $table, string $classEntity) {
            $this->connection = App::getConnection(); // OBTENFGO LA CONEXIÓN DE LA BD DESDE EL CONTENEDOR (App)
            $this->table = $table; // NOMBRE DE LA TABLA
            $this->classEntity = $classEntity; // NOMBRE DE LA CLASE ASOCIADA
        }

        // MÉTODO PARA GUARDAR UNA NUEVA ENTIDAD EN LA BD
        public function save(IEntity $entity) : void {
            try {
                $parameters = $entity->toArray();

                $sql = sprintf('insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(',:', array_keys($parameters)));

                // PREPARO LA CONSULTA Y LA EJECUTO
                $statement = $this->connection->prepare($sql);
                $statement->execute($parameters);
            } catch (PDOException $exception) {
                throw new QueryException("Error al insetar en la BD");
            }
        }

        // MÉTODO PARA EJECUTAR UNA CONSULTA SQL Y OBTENER LOS RESULTADOS COMO OBJETOS DE UNA CLASE
        public function executeQuery(string $sql) : array {
            $pdoStatement = $this->connection->prepare($sql);

            if ($pdoStatement->execute() === false) {
                throw new QueryException("No se ha podido ejecutar la consulta");
            }

            return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
        }

        // MÉTODO PARA OBTENER TODOS LOS REGISTROS DE LA TABLA
        public function findAll(): array {
            $sql = "SELECT * FROM $this->table";

            return $this->executeQuery($sql);
        }

        // MÉTODO PARA ENCONTRAR EL PRIMER REGISTRO POR SU (id)
        public function find(int $id): IEntity {
            $sql = "SELECT * FROM $this->table WHERE id=$id";
            $result = $this->executeQuery($sql);

           // SI NO SE ENCUENTRAN RESULTADOS, LANZO UNA EXCEPCIÓN
            if (empty($result)) {
                throw new NotFoundException("No se ha encontrado ningún elemnto con id $id");
            }
            
            return $result[0];
        }

        // MÉTODO PARA EJECUTAR TRANSACCIONES SQL
        public function executeTransaction(callable $fnExecuteQuerys) {
            try {
                $this->connection->beginTransaction(); // INICIO UNA TRANSACCIÓN
                $fnExecuteQuerys(); // EJECUTA EL CALLABLE PASADO COMO PARÁMETRO           
                $this->connection->commit(); // CONFIRMO LOS CAMBIOS REALIZADOS DURANTE LA TRANSACCIÓN
            } catch (PDOException $pdoException) {
                $this->connection->rollBack(); // REVERSA LOS CAMBIOS SI OCURRE ALGÚN ERROR
                
                throw new QueryException("No se ha podido realizar la operación");
            }
        }

        // MÉTODO PARA RETORNAR UN (STRING) CON LAS ACTUALIZACIONES EXCLUYENDO EL (Id)
        public function getUpdates(array $parameters) {
            $updates = [];
            
            // RECORRO LAS CLAVES DEL ARRAY DE PARAMETRO, Y SI LA CLAVE ES DISTINRA AL (Id) GENERO UNA ASIGNACIÓN PARA CADA PARÁMETRO
            foreach (array_keys($parameters) as $key) {
                if ($key !== 'id') {
                    $updates[] = "$key = :$key";
                }
            }

            return implode(', ', $updates);
        }

        // MÉTODO PARA ACTUALIZAR UNA ENTIDAD EN LA BD
        public function update(IEntity $entity): void {
            try {
                $paremeters = $entity->toArray();

                // ACTUALIZO LOS CAMPOS CON LA NUEVA CONSULTA SQL
                $sql = sprintf('UPDATE %s SET %s WHERE id=:id',
                       $this->table, $this->getUpdates($paremeters));

                // PREPARO LA CONSULTA Y LA EJECUTO
                $statement = $this->connection->prepare($sql);
                $statement->execute($paremeters);
            } catch (PDOException $pdoException) {
                throw new QueryException("Error al actualizar");
            }
        }
    }
?>