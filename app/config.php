<?php
    return ['database' =>
                ['name' => 'proyecto', // Nombre BD
                'username' => 'userProyecto',
                'password' => 'userProyecto',
                'connection' => 'mysql:host=dwes.local', // Configuración de la conexión
                'options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // PARA EVITAR PROBLEMA CON LOS CARACTEREES ESPECIALES
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // MANEJO DE ERRORES
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_AUTOCOMMIT => false // DESACTIVO EL MODO (AUTOCOMIT) PARA QUE LOS CAMBIOS NO SE GUARDEN HASTA EJECUTAR UN (COMMIT)
                ]
                ]
    ]
?>