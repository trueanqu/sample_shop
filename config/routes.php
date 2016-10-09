<?php
/**
 * Created by PhpStorm.
 * User: bohdan
 * Date: 8/17/16
 * Time: 11:03 AM
 */
return [
    'index' => [
        'pattern' => '/',
        'http_method' => 'GET',
        'class' => 'IndexController',
        'method' => 'getIndex'
    ],
    /*--------------------------------------CATEGORIES SECTION-----------------------------------------------*/
    'get_categories' => [
        'pattern' => '/category',
        'http_method' => 'GET',
        'class' => 'CategoryController',
        'method' => 'getCategories'
    ],
    /*CRUD -> read*/
    'get_category_by_name' => [
        'pattern' => '/category/{name}',
        'http_method' => 'GET',
        'class' => 'CategoryController',
        'method' => 'getCategoryByName',
        'requirements' => [
            'name' => '[a-z]+'
        ]
    ],
    /*--------------------------------------PRODUCTS SECTION-------------------------------------------------*/
    'get_products' => [
        'pattern' => '/product',
        'http_method' => 'GET',
        'class' => 'ProductController',
        'method' => 'getProducts'
    ],
    /*CRUD -> read*/
    'get_product_by_id' => [
        'pattern' => '/product/{id}',
        'http_method' => 'GET',
        'class' => 'ProductController',
        'method' => 'getProductByID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
    ],
    /*CRUD -> create*/
    'create_product_with_id' => [
        'pattern' => '/product/{id}',
        'http_method' => 'POST',
        'class' => 'ProductController',
        'method' => 'createProductWithID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
    ],
    /*CRUD -> update*/
    'update_product_with_id' => [
        'pattern' => '/product/{id}',
        'http_method' => 'PUT',
        'class' => 'ProductController',
        'method' => 'updateProductWithID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
    ],
    /*CRUD -> update*/
    'delete_product_with_id' => [
        'pattern' => '/product/{id}',
        'http_method' => 'DELETE',
        'class' => 'ProductController',
        'method' => 'deleteProductWithID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
    ],
    'get_clients' => [
        'pattern' => '/client',
        'http_method' => 'GET',
        'class' => 'ClientController',
        'method' => 'getClients'
    ],
    'get_orders' => [
        'pattern' => '/order',
        'http_method' => 'GET',
        'class' => 'OrderController',
        'method' => 'getOrders'
    ]
];