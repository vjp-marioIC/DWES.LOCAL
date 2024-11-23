<?php
    require_once __DIR__. '/../exceptions/AppException.class.php';

    class App {
        private static $container=[];

        // MÉTODO PARA ASOCIAR UNA CLAVE CON UN VALOR EN EL CONTENEDOR
        public static function bind($clave, $valor) {
                static::$container[$clave] = $valor;
        }

        // MÉTODO PARA OBTENER UN VALOR ASOCOCIADO A UN CLAVE ESPECÍFICA EN EL CONTENEDOR
        public static function get(string $key) {
            // SI LA CLAVE NO EXISTE, SE LANZA LA EXCEPCIÓN
            if (!array_key_exists($key, static::$container)) {
                throw new AppException("No se ha encontrado la clave en el contenedor");
            }
           
           return static::$container[$key];
        }

        // MÉTODO PARA OBTENER LA CONEXIÓN DE LA BD
        public static function getConnection() {

            // SI NO EXISTE UNA CONEXIÓN EN EL CONTENEDOR, SE CREA UNA NUEVA UTILIZANDO (Connection::make())
            if (!array_key_exists('connection', static::$container)) {
                static::$container['connection'] = Connection::make();
            }
           
           return static::$container['connection'];
        }
    }
?>