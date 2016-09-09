<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/17/16
 * Time: 10:02 AM
 */

namespace Framework;


abstract class Singleton
{
    private static $instances = array();

    public static function getInstance($className = false)
    {
        $keyClassName = ($className === false) ? get_called_class() : $className;
        if(class_exists($keyClassName))
        {
            if(!isset($instances[$keyClassName]))
                self::$instances[$keyClassName] = new $keyClassName();
            return self::$instances[$keyClassName];
        }

        throw new \Exception('Class '.$keyClassName.' does not exist!');
    }

    final private function __clone(){}
}