<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/14/16
 * Time: 3:53 PM
 */

namespace Framework;


class App extends Singleton
{
    private $config = null;
    private $request = null;

    public function __construct()
    {
        $this->config = Config::getInstance();
        $this->request = new Request();
    }

    public function run()
    {
    }

    public function done()
    {
    }

}