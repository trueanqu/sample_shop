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
    private static $_instance;
    
    private static $config = [];
    private $configDirPath = '../config/';
    private $defaultConfigName = 'default_config.php';
    
    public static function getInstance()
    {
        if(self::$_instance === null) {
            self::$_instance = new Config();
        }
        
        return self::$_instance;
    }
    
    private function __clone(){}
    private function __wakeup(){}

    private function __construct()
    {
        $defaultConfig = include $this->configDirPath.$this->defaultConfigName;
        $configFiles = scandir($this->configDirPath);
        $customConfig = [];

        foreach($configFiles as $value)
        {
            if(strpos($value,'.php') AND $value !== $this->defaultConfigName)
            {
                $customKey = substr($value, 0, strpos($value, '.'));
                $customConfig[$customKey] = include $this->configDirPath.$value;
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