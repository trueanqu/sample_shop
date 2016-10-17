<?php

namespace Framework\DB;


use Framework\DB\Adapters\MySQLAdapter;

class DBObjectManager
{
    public static function getDBObject($driver = 'mysqli')
    {
        switch($driver) {
            case 'mysqli':
                return new MySQLAdapter();
                break;
            default :
                throw new \Exception('No '.$driver.' database driver found.');
        }

    }
}
