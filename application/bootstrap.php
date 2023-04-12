<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

// Создание объекта роутера
$router = new Route();

// Определение маршрутов
$router->addRoute('/', 'main@index');
$router->addRoute('/404', '404@index');
$router->addRoute('/blogs', 'blogs@index');
$router->addRoute('/blogs/{id}', 'blogs@index');
$router->addRoute('/blogs/{id}/{name}', 'blogs@index');
$router->addRoute('/feedback', 'feedback@index');
$router->addRoute('/login', 'login@login');
$router->addRoute('/registration', 'registration@registration');
$router->addRoute('/product/{id}', 'ProductController@show');
$router->addRoute('/category/{id}/page/{page}', 'CategoryController@index');

// Получение URL из параметра запроса

$url = isset($_GET['url']) ? $_GET['url'] : '/';

// Обработка запроса с помощью роутера
$router->dispatch($url);
//Route::start(); // запускаем маршрутизатор
?>