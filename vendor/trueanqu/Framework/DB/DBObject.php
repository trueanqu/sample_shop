<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/21/16
 * Time: 12:27 PM
 */

namespace Framework\DB;

/**
 * Interface DBObject is unified interface which presents a set of required methods to work with various DBs
 * For current DB architecture (metamodel) framework should work with one db(or scheme) per app
 * For now, framework won't contain db/db scheme creation, this should developer do using db administration tools
 * it will be considered that db, specified in configuration file was created and works correctly
 *
 * @package Framework\DB
 */
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
    /**
     * Method to get category tree from database to use as navigation menu
     * @return mixed
     */
}