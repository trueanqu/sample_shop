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
    /*PRODUCTS SECTION*/
    'get_products' => [
        'pattern' => 'products/',
        'http_method' => 'GET',
        'class' => 'ProductController',
        'method' => 'getProducts'
    ],
    /*CRUD -> read*/
    'get_product_by_id' => [
        'pattern' => 'products/{id}',
        'http_method' => 'GET',
        'class' => 'ProductController',
        'method' => 'getProductByID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
    ],
    /*CRUD -> create*/
    'create_product_with_id' => [
        'pattern' => 'products/{id}',
        'http_method' => 'POST',
        'class' => 'ProductController',
        'method' => 'createProductWithID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
    ],
    /*CRUD -> update*/
    'update_product_with_id' => [
        'pattern' => 'products/{id}',
        'http_method' => 'PUT',
        'class' => 'ProductController',
        'method' => 'updateProductWithID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
    ],
    /*CRUD -> update*/
    'delete_product_with_id' => [
        'pattern' => 'products/{id}',
        'http_method' => 'DELETE',
        'class' => 'ProductController',
        'method' => 'deleteProductWithID',
        'requirements' => [
            'id' => '[0-9]+'
        ]
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