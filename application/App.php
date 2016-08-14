<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/14/16
 * Time: 3:53 PM
 */

namespace App;


class App
{
    public $config = [];
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function run()
    {
    }

    public function done()
    {
    }

}