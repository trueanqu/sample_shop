<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/21/16
 * Time: 12:29 PM
 */

namespace Framework\DB\Adapters;


use Framework\DB\client;
use Framework\DB\DBObject;
use Framework\DB\order;

class MySQLAdapter implements DBObject 
{

    function getCategoryTree()
    {
        // TODO: Implement getCategoryTree() method.
    }

    function getClientOrders($client)
    {
        // TODO: Implement getClientOrders() method.
    }

    function getOrder($order)
    {
        // TODO: Implement getOrder() method.
    }

    function getOrders()
    {
        // TODO: Implement getOrders() method.
    }

    function getCategory($category, $recursively = FALSE)
    {
        // TODO: Implement getCategory() method.
    }
}