<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/17/16
 * Time: 11:03 AM
 */
return [
    'get_categories' => [
        'pattern' => 'categories/',
        'http_method' => 'GET',
        'class' => 'CategoryController',
        'method' => 'getCategories'
    ],
    'get_products' => [
        'pattern' => 'products/',
        'http_method' => 'GET',
        'class' => 'ProductController',
        'method' => 'getProducts'
    ],
    'get_clients' => [
        'pattern' => 'clients/',
        'http_method' => 'GET',
        'class' => 'ClientController',
        'method' => 'getClients'
    ],
    'get_orders' => [
        'pattern' => 'orders/',
        'http_method' => 'GET',
        'class' => 'OrderController',
        'method' => 'getOrders'
    ]
];