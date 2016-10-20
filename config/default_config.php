<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/17/16
 * Time: 10:56 AM
 */

return [
    'sitename' => 'sample_shop',
    'encode' => 'utf-8',
    'default_controller' => 'index',
    'default_action' => 'index',
    'db' => [
        'dbms' => 'mysql',
        'host' => '127.0.0.1',
        'user' => 'root',
        'port' => '3306',
        'database' => 'sample_shop_db'
    ],
    'routes' => [],
    'scripts' => [
        '/path-to-script/script.js',
        '/path-to-scriot/script1.js'
    ],
    'styles' => [],
    'request' => [],
    'dbobject_manager' => []
];