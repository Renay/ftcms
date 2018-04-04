<?php

// Routes CMS
Router::get('index', '/', 'HomeController@index');
Router::get('description', '/description', 'HomeController@desc');

Router::post('commet', '/admin/setOnline/user{id}', 'HomeController@setOnline');

Router::get('goods.handler', '/goods/handle', 'MerchantController@handlePay');
Router::post('goods.buy', '/goods/buy', 'MerchantController@buyed');
Router::post('goods.recount', '/goods/recount/{goods}', 'MerchantController@goodsRecount');
Router::post('goods.server', '/goods/server/{server}', 'MerchantController@gGoodsFServer');

// Admin routes
Router::get('admin.index', '/admin', 'Admin\DashboardController@index');

// Login Routes
Router::get('admin.login', '/admin/login', 'Admin\LoginController@formView');
Router::get('admin.logout', '/admin/logout', 'Admin\LoginController@logout');
Router::post('admin.auth', '/admin/auth', 'Admin\LoginController@auth');

Router::get('admin.goods', '/admin/goods', 'Admin\GoodsController@index');
Router::get('admin.goods.edit', '/admin/goods/{id}', 'Admin\GoodsController@edit');
Router::get('admin.desc.edit', '/admin/goods/desc/{id}', 'Admin\GoodsController@desc');
Router::post('admin.desc.edit.send', '/admin/goods/desc', 'Admin\GoodsController@upDesc');
Router::post('admin.goods.update', '/admin/goods/update', 'Admin\GoodsController@update');
Router::post('admin.goods.create', '/admin/goods/create', 'Admin\GoodsController@create');
Router::post('admin.goods.delete', '/admin/goods/delete', 'Admin\GoodsController@delete');

Router::get('admin.categories', '/admin/categories', 'Admin\CategoriesController@index');
Router::get('admin.categories.edit', '/admin/categories/{id}', 'Admin\CategoriesController@edit');
Router::post('admin.categories.update', '/admin/categories/update', 'Admin\CategoriesController@update');
Router::post('admin.categories.create', '/admin/categories/create', 'Admin\CategoriesController@create');
Router::post('admin.categories.delete', '/admin/categories/delete', 'Admin\CategoriesController@delete');

Router::get('admin.servers', '/admin/servers', 'Admin\ServerController@index');
Router::get('admin.servers.edit', '/admin/servers/{id}', 'Admin\ServerController@edit');
Router::post('admin.servers.status', '/admin/servers/status', 'Admin\ServerController@status');
Router::post('admin.servers.update', '/admin/servers/update', 'Admin\ServerController@update');
Router::post('admin.servers.create', '/admin/servers/create', 'Admin\ServerController@create');
Router::post('admin.servers.delete', '/admin/servers/delete', 'Admin\ServerController@delete');

Router::get('admin.payments', '/admin/payments', 'Admin\PaymentController@index');
Router::post('admin.payments.load', '/admin/payments/load', 'Admin\PaymentController@load');
Router::post('admin.payments.search', '/admin/payments/search', 'Admin\PaymentController@search');

Router::get('admin.merchant', '/admin/merchant', 'Admin\MerchantController@index');
Router::post('admin.merchant.edit', '/admin/merchant/{merchant}', 'Admin\MerchantController@edit');

Router::get('admin.console', '/admin/console', 'Admin\ConsoleController@index');
Router::post('admin.console.send', '/admin/console/sendcmd/{server}', 'Admin\ConsoleController@sendCommand');
Router::post('admin.console.connect', '/admin/console/{server}', 'Admin\ConsoleController@isConnect');

Router::get('admin.users', '/admin/users', 'Admin\UserController@index');
Router::get('admin.users.edit', '/admin/users/{id}', 'Admin\UserController@edit');
Router::post('admin.users.create', '/admin/users/create', 'Admin\UserController@create');
Router::post('admin.users.delete', '/admin/users/delete', 'Admin\UserController@delete');
Router::post('admin.users.update', '/admin/users/update', 'Admin\UserController@update');

// Settings Routes (GET)
Router::get('admin.settings', '/admin/settings', 'Admin\SettingController@index');
Router::post('admin.settings.save', '/admin/settings/save', 'Admin\SettingController@save');