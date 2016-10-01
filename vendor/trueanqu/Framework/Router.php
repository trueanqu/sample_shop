<?php
/**
 * Created by PhpStorm.
 * User: anqu
 * Date: 19.09.16
 * Time: 12:06
 */

namespace Framework;


class Router extends Singleton
{
    private $routes = array();

    private function __construct()
    {
        $this->getRoutesFromConfig();
    }

    protected static function createInstance()
    {
        return new Router();
    }

    private function getRoutesFromConfig()
    {
        $config = Config::getInstance();
        $this->routes = $config->getConfigByName('routes');
        $this->parsePatterns();
    }


    private function parsePatterns()
    {
        foreach ($this->routes as $key => $route)
        {
            $route['pattern'] = str_replace('/','\/',$route['pattern']);
            if(isset($route['requirements']))
            {
                foreach ($route['requirements'] as $par => $restr)
                {
                    $route['pattern'] = preg_replace('/\{'.$par.'\}/', $restr, $route['pattern']);
                }
            }

            $route['pattern'] = '/^'.$route['pattern'].'$/';
            $this->routes[$key] = $route;
        }
    }

    public function getRoute(Request $request)
    {

    }
}