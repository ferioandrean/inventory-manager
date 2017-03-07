<?php
require('../vendor/autoload.php');

use \App\System\App;
use \App\System\Router\Router;
use \App\System\Settings;
use \App\Models\UsersModel;

session_start();

$router = new Router($_GET);

$router->get('/', function() {
    $controller = new \App\Controllers\ProductsController();
    $controller->blank();
});

$router->get('/admin/dashboard/', function() {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->index();
});

$router->get('/admin/products/', function() {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->all();
});

$router->get('/admin/products/add/', function() {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->add();
});

$router->post('/admin/products/add/', function() {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->add();
});

$router->get('/admin/products/:id/edit/', function($id) {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->edit($id);
})->with('id', '[0-9]+');

$router->post('/admin/products/:id/edit/', function($id) {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->edit($id);
})->with('id', '[0-9]+');

$router->get('/admin/products/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->post('/admin/products/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\ProductsController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->get('/admin/categories/', function() {
    App::secured();
    $controller = new \App\Controllers\CategoriesController();
    $controller->all();
});

$router->get('/admin/categories/add/', function() {
    App::secured();
    $controller = new \App\Controllers\CategoriesController();
    $controller->add();
});

$router->post('/admin/categories/add/', function() {
    App::secured();
    $controller = new \App\Controllers\CategoriesController();
    $controller->add();
});

$router->get('/admin/categories/:id/edit/', function($id) {
    App::secured();
    $controller = new \App\Controllers\CategoriesController();
    $controller->edit($id);
})->with('id', '[0-9]+');

$router->post('/admin/categories/:id/edit/', function($id) {
    App::secured();
    $controller = new \App\Controllers\CategoriesController();
    $controller->edit($id);
})->with('id', '[0-9]+');

$router->get('/admin/categories/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\CategoriesController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->post('/admin/categories/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\CategoriesController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->get('/admin/users/', function() {
    App::secured();
    $controller = new \App\Controllers\UsersController();
    $controller->all();
});

$router->get('/admin/users/add/', function() {
    App::secured();
    $controller = new \App\Controllers\UsersController();
    $controller->add();
});

$router->post('/admin/users/add/', function() {
    App::secured();
    $controller = new \App\Controllers\UsersController();
    $controller->add();
});

$router->get('/admin/users/:id/edit/', function($id) {
    App::secured();
    $controller = new \App\Controllers\UsersController();
    $controller->edit($id);
})->with('id', '[0-9]+');

$router->post('/admin/users/:id/edit/', function($id) {
    App::secured();
    $controller = new \App\Controllers\UsersController();
    $controller->edit($id);
})->with('id', '[0-9]+');

$router->get('/admin/users/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\UsersController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->post('/admin/users/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\UsersController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->get('/admin/reports/', function() {
    App::secured();
    $controller = new \App\Controllers\ReportsController();
    $controller->all();
});

$router->get('/admin/reports/add/', function() {
    App::secured();
    $controller = new \App\Controllers\ReportsController();
    $controller->add();
});

$router->post('/admin/reports/add/', function() {
    App::secured();
    $controller = new \App\Controllers\ReportsController();
    $controller->add();
});

$router->get('/admin/reports/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\ReportsController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->post('/admin/reports/:id/delete/', function($id) {
    App::secured();
    $controller = new \App\Controllers\ReportsController();
    $controller->delete($id);
})->with('id', '[0-9]+');

$router->get('/signin/', function() {
    $controller = new \App\Controllers\UsersController();
    $controller->login();
});

$router->post('/signin/', function() {
    $controller = new \App\Controllers\UsersController();
    $controller->login();
});

$router->get('/signout/', function() {
    $controller = new \App\Controllers\UsersController();
    $controller->logout();
});

$router->get('/admin/api/products', function() {
    $controller = new \App\Controllers\ProductsController();
    $controller->search($_GET);
});

$router->get('/admin/api/index', function() {
    echo Settings::getConfig()['url'];
});

$router->error(function() {
    App::error();
});

$router->run();
