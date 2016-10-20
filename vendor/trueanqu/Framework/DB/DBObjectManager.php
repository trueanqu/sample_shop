<?php

namespace Framework\DB;


use Framework\Config;

class DBObjectManager
{
    public static function getDBObject($config = [])
    {
        $config = array_merge(Config::getConfigByName('db'), $config);
        $adapter = self::findAdapter($config);
        return new $adapter($config);
    }

    public static function findAdapter($config)
    {
        $managerConfig = Config::getConfigByName('dbobject_manager');
        if(in_array($config['dbms'], array_keys($managerConfig)))
            return $managerConfig[$config['dbms']];
        throw new \Exception('No database driver found for \''.$config['dbms'].'\' DBMS');
    }
}
