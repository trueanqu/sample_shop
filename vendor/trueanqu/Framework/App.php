<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/14/16
 * Time: 3:53 PM
 */

namespace Framework;

use Framework\Router;


class App extends Singleton
{
    private $config = null;
    private $request = null;

    private function __construct()
    {
        $this->config = Config::getInstance();
        $this->request = Request::getInstance();
    }

    public function run()
    {
        $router = Router::getInstance();
        $route = $router->getRoute();
    }

    public function done()
    {
    }

    protected static function createInstance()
    {
        return new App();
    }

}