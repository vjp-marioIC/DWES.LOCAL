<?php
    namespace proyecto\entities;
    use Monolog;

    class MyLog {
        // ATRIBUTOS
        private $log;

        // CONSTRUCTOR
        public function __construct(string $filename) {
            $this->log = new Monolog\Logger('name');
            $this->log->pushHandler(new Monolog\Handler\StreamHandler($filename, Monolog\Level::Info));
        }
    }
?>