<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/17/16
 * Time: 10:29 AM
 */

namespace Framework;


class Config extends Singleton
{
    private static $config = [];

    private function __construct()
    {
        $defaultConfig = include '../config/default_config.php';
        $configFiles = scandir('../config/');
        $customConfig = [];

        foreach($configFiles as $value)
        {
            if(strpos($value,'.php') AND $value !== 'default_config.php')
            {
                $customKey = substr($value, 0, strpos($value, '.'));
                $customConfig[$customKey] = include '../config/'.$value;
            }
        }

        self::$config = array_merge($defaultConfig,$customConfig);
    }

    /**Get full configuration
     *
     * @return array
     */
    public static function getConfig()
    {
        return self::$config;
    }

    /**Get certain value or array of values correspond requested $name
     *
     * @param $name string of configuration to get
     * @return mixed value or array of configurational values were requested
     * @throws \Exception if there is no configuration which corresponds to $name
     */
    public static function getConfigByName ($name)
    {
        if(isset(self::$config[$name]))
            return self::$config[$name];
        throw new \Exception('No configuration for '.$name.' has been set.');
    }

    protected static function createInstance()
    {
        return new Config();
    }

}