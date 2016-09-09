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
     * Method to get category tree from database to use as navigation menu
     * @return mixed
     */
    function getCategoryTree();

    /** Get certain client's orders
     * @param $client client identifier
     * @return mixed
     */
    function getClientOrders($client);

    /**
     * Get specific order ...
     * @param $order order identifier
     * @return mixed
     */
    function getOrder($order);

    /**
     * Get all orders
     * @return mixed
     */
    function getOrders();


    /**
     * Get category with child elements of lower level ($recursively = FALSE) or with child elements of all lower levels ($recursively = TRUE)
     * @param $category
     * @param bool $recursively
     * @return mixed
     */
    function getCategory($category, $recursively = FALSE);


}