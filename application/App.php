<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/14/16
 * Time: 3:53 PM
 */

namespace App;


class App extends Singleton
{
    private $config = null;
    
    public function __construct()
    {
        $this->config = Config::getInstance();
    }

    public function run()
    {
    }

    public function done()
    {
    }

}