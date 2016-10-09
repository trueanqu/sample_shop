<?php
/**
 * Created by PhpStorm.
 * User: anqu
 * Date: 19.09.16
 * Time: 12:06
 */

namespace Framework;

/**
 * Class Router to analyze Request data and choose the corresponding route
 * @package Framework
 */
class Router
{
    private static $_instance;

    private $routes = array();

    private function __construct()
    {
        $this->getRoutesFromConfig();
    }

    public static function getInstance()
    {
        if( self::$_instance === null)
        {
            self::$_instance = new Router();
        }
        return self::$_instance;
    }

    private final function __clone()
    {
    }

    /**
     * Get and preprocess router config
     */
    private function getRoutesFromConfig()
    {
        $config = Config::getInstance();
        $this->routes = $config->getConfigByName('routes');
        $this->parsePatterns();
    }


    /**
     * Turn config patterns into regexp patterns and include requirements (given in config files)
     */
    private function parsePatterns()
    {
        foreach ($this->routes as $key => $route) {
            $route['pattern'] = str_replace('/', '\/', $route['pattern']);
            if (isset($route['requirements'])) {
                $route['params'] = array_keys($route['requirements']);

                foreach ($route['requirements'] as $par => $restr) {
                    $route['pattern'] = preg_replace('/\{' . $par . '\}/', '(' . $restr . '?)', $route['pattern']);
                }
            }

            $route['pattern'] = '/^' . $route['pattern'] . '$/';
            $this->routes[$key] = $route;
        }
    }

    /**
     * Get route corresponding current request http_method and uri
     * @return mixed|null
     */
    public function getRoute(Request $request)
    {
        foreach ($this->routes as $routeName => $route) {
            if (preg_match($route['pattern'], $request->getRequestUri(), $matches)
                && $route['http_method'] == $request->getRequestMethod()
            ) {
                if (count($matches) > 1) {
                    $matches = array_slice($matches, 1);
                    $route['params'] = array_combine($route['params'], $matches);
                }

                echo '<pre>';
                var_dump($this->buildRoute($routeName, $route['params']));

                return $route;
            }

        }

        return null;
    }


    public function buildRoute($name, $params = [])
    {
        $routes = Config::getInstance()->getConfigByName('routes');
        $outRoute = null;

        if(isset($routes[$name])) {
            if (isset($params)) {
                foreach ($params as $parName => $parValue) {
                    $outRoute = preg_replace('/\{' . $parName . '\}/', $parValue, $routes[$name]['pattern']);
                }

                return $outRoute;

            } elseif (!isset($params)) {
                foreach ($this->routes as $parName => $parValue) {
                    $outRoute = preg_replace('/\{' . $parName . '\}/', $parValue, $routes[$name]['pattern']);
                }

                return $outRoute;

            } else {
                return $outRoute = $routes[$name]['pattern'];
            }

        }

        return $outRoute;
    }
}