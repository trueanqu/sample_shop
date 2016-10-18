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
    private $configDirPath = '../config/';
    private $defaultConfigName = 'default_config.php';

    private function __construct()
    {
        $defaultConfig = include $this->configDirPath.$this->defaultConfigName;
        $configFiles = scandir($this->configDirPath);
        $customConfig = [];

        foreach($configFiles as $configFile)
        {
            if(strpos($configFile,'.php') AND $configFile !== $this->defaultConfigName)
            {
                $customKey = substr($configFile, 0, strpos($configFile, '.'));
                $customValue = include $this->configDirPath.$configFile;

                $customConfig[$customKey] = (is_array($defaultConfig[$customKey]) && is_array($customValue)) ?
                    array_merge($defaultConfig[$customKey], $customValue) : $customConfig[$customKey] = $customValue;

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