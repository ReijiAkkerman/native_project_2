<?php
    require_once __DIR__ . '/../control/Log.php';
    require_once __DIR__ . '/../control/Reg.php';

    final class Router {
        public static string $controller;
        public string $method;
        public array $args;

        public function __construct() {
            $this->parseRequest();
        }

        public function action(): void {
            ($this->args) ?
            (new Router::$controller)->{$this->method}($this->args) :
            (new Router::$controller)->{$this->method}();
        }

        public function parseRequest(): void {
            $request = explode('/', $_SERVER['REQUEST_URI']);

            $controllerPart = $request[1];
            $methodPart = $request[2];
            $argsPart = [];
            for($i = 3; $i < sizeof($request); $i++)
                $argsPart[] = $request[$i];

            Router::$controller = ucfirst($controllerPart);
            $this->method = $methodPart;
            $this->args = $argsPart;
        }
    }