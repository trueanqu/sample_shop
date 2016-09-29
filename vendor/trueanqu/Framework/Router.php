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
        foreach ($this->routes as $routerKey => $config)
        {
            //@TODO: fix pattern replacing
            str_replace('/','\/',$config['pattern']);
            $reqKeys = preg_match('%\{[a-z]+\}%', $config['pattern']);
            if(isset($config['requirements'][$reqKeys[1]]))
                preg_replace('%\{([a-z]+?)\}%',$config['requirements'][$reqKeys[1]], $config['pattern']);
            $config['pattern'] = '/^'.$config['pattern'].'$/';
        }
    }

    public function getRoute(Request $request)
    {

    }
}