<?php
class Router {
    private $routes = [];

    public function get($uri, $controller) {
        $this->addRoute('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        $this->addRoute('POST', $uri, $controller);
    }

    public function put($uri, $controller) {
        $this->addRoute('PUT', $uri, $controller);
    }

    public function delete($uri, $controller) {
        $this->addRoute('DELETE', $uri, $controller);
    }

    private function addRoute($method, $uri, $controller) {
        $this->routes[] = ['method' => $method, 'uri' => $uri, 'controller' => $controller];
    }

    public function dispatch($uri, $method) {
        $uri = str_replace('/api-project', '', $uri); // Elimina el prefijo
        echo "Requested URI: $uri\n";
        echo "Requested Method: $method\n";
        foreach ($this->routes as $route) {
            $routeUri = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route['uri']);
            if (preg_match("#^$routeUri$#", $uri, $matches) && $route['method'] == $method) {
                list($controller, $action) = explode('@', $route['controller']);
                require_once "controllers/$controller.php";
                $controller = new $controller;
                array_shift($matches); // Elimina el primer elemento que es la coincidencia completa
                call_user_func_array([$controller, $action], $matches);
                return;
            }
        }
        echo json_encode(['error' => 'Route not found']);
    }
}
