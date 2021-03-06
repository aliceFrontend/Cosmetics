<?php
return array(
    'user/login/user/register' => 'user/register',

	 // Товар:
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    // Каталог:
    'catalog' => 'catalog/index', // actionIndex в CatalogController
	
    //категории
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController   

    'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController  
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    
    'panel' => 'admin/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

	'' => 'site/index',

);