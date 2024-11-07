<?php
    return ['database' =>
                ['name' => 'proyecto', // Nombre BD
                'username' => 'userProyecto',
                'password' => 'userProyecto',
                'connection' => 'mysql:host=dwes.local', // Configuración de la conexión
                'options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_AUTOCOMMIT => false
                ]
                ]
    ]
?>