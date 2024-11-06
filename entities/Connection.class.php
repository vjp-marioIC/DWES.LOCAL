<?php
    require_once __DIR__. '/App.class.php';

    class Connection {
        public static function make() {
            try {
                $config = App::get('config')['database']; // Utilizamos el contenedor de servicios
                                                          // para obtener la configuración

                $connection = new PDO(
                    $config['connection'] . ';dbname=' . $config['name'],
                    $config['username'], $config['password'],
                    $config['options']
                );
            } catch (PDOException $PDOException) {
                throw new AppException("No se ha podido crear la conexión a la BD");
            }

            return $connection;
        }
    }
?>