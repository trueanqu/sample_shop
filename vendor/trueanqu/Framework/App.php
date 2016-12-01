<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/14/16
 * Time: 3:53 PM
 */

namespace Framework;

use Framework\Router;


class App
{
    private static $_instance;

    private $config = null;
    private $request = null;

    public static function getInstance()
    {
        if(self::$_instance === null) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    private function __clone(){}
    private function __wakeup(){}

    private function __construct()
    {
        $this->config = Config::getInstance();
        $this->request = Request::getInstance();
    }

    public function run()
    {
        $router = Router::getInstance();
        $route = $router->getRoute($this->request);
    }

    public function done()
    {
    }

    protected static function createInstance()
    {
        return new App();
    }

}