<?php

namespace Core;

class Router
{

    private array $routes = [];

    public function get(string $path, callable|array $callback)
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post(string $path, callable|array $callback)
    {
        $this->addRoute('POST', $path, $callback);
    }

    public function addRoute(string $method, string $path, callable|array $callback)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function dispatch()
    {
        $request_method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            $pattern = preg_replace('#\{[\w]+\}#', '([\w-]+)', $route['path']);
            $pattern = "#^$pattern$#";

            if ($route['method'] === $request_method && preg_match($pattern, $path, $matches)) {
                array_shift($matches);
                [$class, $method2] = $route['callback'];
                $controller = new $class();
                return $controller->$method2();
            }
        }

        http_response_code(404);
        return "404 Not Found";
    }
}
