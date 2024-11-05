<?php
    class Connection {
        public static function make() {
            $opciones = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Para que utilice utf8
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Para cuando se produzca un error

                // Se genera una excepción y así poder capturarla
                PDO::ATTR_PERSISTENT => true // Para que no cierre la conexión y mejorar el rendimiento
            ];
            try {
                $connection = new PDO('mysql:host=dwes.local;dbname=proyecto;charset=utf8', 'userProyecto', 'userProyecto', $opciones);
            } catch (PDOException $PDOException) {
                die($PDOException -> getMessage());
                // (die) es una función que muestra el string que se le pasa
                // y detiene la ejecución del script
            }

            return $connection;
        }
    }
?>