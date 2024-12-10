<?php
    namespace proyecto\utils;
    use proyecto\exceptions\NotFoundException;

    class Router {
        // ATRIBUTOS
        private $routes;

        private function __construct() {
            $this->routes = [
                'GET' => [],
                'POST' => []
            ];
        }

        public function get(string $uri, string $controller):void {
            $this->routes['GET'][$uri] = $controller;
        }

        public function post(string $uri, string $controller):void {
            $this->routes['POST'][$uri] = $controller;
        }

        public function direct(string $uri, string $method):string {
            if (array_key_exists($uri, $this->routes[$method])) {
                return $this->routes[$method][$uri];
            } else {
                throw new NotFoundException('No se ha definido una ruta paralauri solicitada');
            }
        }

        public static function load(string $file):Router {
            $router = new Router();
            require $file;
            return $router;
        }
    }
?>