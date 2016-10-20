<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/21/16
 * Time: 12:29 PM
 */

namespace Framework\DB\Adapters;

use Framework\DB\DBObject;


class MySQLAdapter implements DBObject
{
    private $mysqlConnection;
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }

    function getConnection()
    {
        return $this->mysqlConnection;
    }

    function query()
    {
        // TODO: Implement query() method.
    }

    function close()
    {
        // TODO: Implement close() method.
    }

    function connect()
    {
        if (empty($this->config['driver_options'])) {
            $this->mysqlConnection = new \mysqli($this->config['host'], $this->config['user'],
                $this->config['password'], $this->config['database'], $this->config['port']);
        } else {

            $mysqli = new \mysqli();
            $mysqli->init();

            foreach ($this->config['driver_options'] as $name => $value) {
                $mysqli->options($name, $value);
            }

            $this->mysqlConnection = $mysqli->real_connect($this->config['host'], $this->config['user'],
                $this->config['password'], $this->config['database'], $this->config['port']);
        }

        if ($this->mysqlConnection->connect_errno) {
            throw new \Exception("Couldn't connect to MySQL: " . $this->mysqlConnection->connect_errno . " "
                . $this->mysqlConnection->connect_error);
        }
    }

    function execute()
    {
        // TODO: Implement execute() method.
    }

    function getDriverInfo()
    {
        // TODO: Implement getDriverInfo() method.
    }

    function getResultRaw()
    {
        // TODO: Implement getResultRaw() method.
    }

    function getResultAssoc()
    {
        // TODO: Implement getResultAssoc() method.
    }

    function getResultObject()
    {
        // TODO: Implement getResultObject() method.
    }

    function getErrorNumber()
    {
        // TODO: Implement getErrorNumber() method.
    }

    function getErrorMessage()
    {
        // TODO: Implement getErrorMessage() method.
    }
}