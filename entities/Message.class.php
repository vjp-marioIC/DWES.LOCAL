<?php
    require_once 'database/IEntity.class.php';

    class Message implements IEntity {

        // ATRIBUTOS
        private $nombre;
        private $apellidos;
        private $asunto;
        private $email;
        private $texto;
        private $fecha;
        private $id;

        // CONSTRUCTOR PARAMETRIZADO
        public function __construct(string $nombre = '', string $apellidos = '', string $asunto = '', string $email = '', string $texto = '', DateTime $fecha = null) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->asunto = $asunto;
            $this->email = $email;
            $this->texto = $texto;
            $this->fecha = $fecha ?? new DateTime(); // INICIALIZO CON LA FECHA ACTUAL
            $this->id = null;
        }

        // GETTERS Y SETTERS
        public function getNombre(): string {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void {
            $this->nombre = $nombre;
        }

        public function getApellidos(): string {
            return $this->apellidos;
        }

        public function setApellidos(string $apellidos): void {
            $this->apellidos = $apellidos;
        }

        public function getAsunto(): string {
            return $this->asunto;
        }

        public function setAsunto(string $asunto): void {
            $this->asunto = $asunto;
        }

        public function getEmail(): string {
            return $this->email;
        }

        public function setEmail(string $email): void {
            $this->email = $email;
        }

        public function getTexto(): string {
            return $this->texto;
        }

        public function setTexto(string $texto): void {
            $this->texto = $texto;
        }

        public function getFecha(): DateTime {
            return $this->fecha;
        }

        public function setFecha(DateTime $fecha): void {
            $this->fecha = $fecha;
        }

        public function getId() {
            return $this->id;
        }

        // MÉTODO (toArray)
        public function toArray(): array {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'apellidos' => $this->getApellidos(),
                'asunto' => $this->getAsunto(),
                'email' => $this->getEmail(),
                'texto' => $this->getTexto(),
                'fecha' => $this->getFecha()->format('Y-m-d H:i:s')
                // PASO LA FECHA A (STRING) CON FORMATO PARA QUE SEA LEIDA POR LA SENTENCIA SQL
            ];
        }
    }
?>