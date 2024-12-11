<?php
    namespace proyecto\entities;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use Monolog\Level;

    class MyLog {
        // ATRIBUTOS
        private $log;

        // CONSTRUCTOR
        public function __construct(string $filename) {
            $this->log = new Logger('name');
            $this->log->pushHandler(new StreamHandler($filename, Level::Info));
        }
    }
?>