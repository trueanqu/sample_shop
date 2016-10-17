<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/21/16
 * Time: 12:27 PM
 */

namespace Framework\DB;

interface DBObject
{
    function connect();

    /**
     * Send query to DB server
     * @return mixed
     */
    function query();

    function close();

    function getResultRaw();

    function getResultAssoc();

    function getResultObject();

    function getErrorNumber();

    function getErrorMessage();


}