<?php
    require_once __DIR__. '/App.class.php';

    class Connection {

        // MÉTODO PARA CREAR UNA CONEXIÓN A LA BASE DE DATOS UTILIZANDO (PDO)
        public static function make() {
            try {

                // OBTENGO LA CONFIGURACIÓN DE A BD UTILIZANDO (App)
                // (config) TIENE LA CLAVE (database) CON LOS PARAMETROS NECESARIOS
                $config = App::get('config')['database']; 

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