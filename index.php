<?php
session_start();

//переписываем фунцию автозагрузки классов
spl_autoload_register(function ($class)
{
    // Engine\Routing\Router превращается в массим из ['Engine\Routing', 'Router']
    preg_match("#^(.+)\\\\(.+?)$#", $class, $match);

    //пространство имен
    $namespace = $match[1];
    //название класса
    $className = $match[2];
    //меняем бекслеши в пространстве имен на / и получаем путь к файлу
    $classPath = str_replace('\\', '/', $namespace);

    //если файл в директории существует то подключаем его
    if(file_exists($classPath . '/' . $className . '.php'))
    {
        require_once ($classPath . '/' . $className . '.php');
    } else {
        return 'Файл: ' . $className . ' не найден';
    }
});

use Engine\Routing\Router;
use Engine\Routing\Request;

//подключаем файл путей для Router
require_once 'engine/routes.php';

//в Router помещаем класс Request с uri в виде get запроса и начинаем работу приложения run()
(new Router(new Request()))->run();