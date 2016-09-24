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
    /**
     * Get database connection with credentials listen in current or default config
     * @return mixed
     */
    function getConnection();

    /**
     * Send query to DB server
     * @return mixed
     */
    function query();
}