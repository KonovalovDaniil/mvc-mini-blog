<?php

use Engine\Routing\Router;
use Engine\Routing\Route;

//помещаем в статичное свойство (массив) Router'а все нужные пути в виде объектов класса Route (addRoute())
/*Router::addRoute(new Route('', 'show', 'BlogController'));*/
Router::addRoute(new Route('blog', 'show', 'BlogController'));
Router::addRoute(new Route('post/{post_id}', 'show', 'PostController'));
Router::addRoute(new Route('author/{author_id}', 'show', 'AuthorController'));
Router::addRoute(new Route('test/{test_id}', 'test', 'TestController'));
Router::addRoute(new Route('admin', 'show', 'AdminController'));
Router::addRoute(new Route('admin/del/{post_id}', 'deletePost', 'AdminController'));
Router::addRoute(new Route('', 'show', 'BlogController'));