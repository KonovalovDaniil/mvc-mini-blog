<?php
namespace Application\Controllers;

use Application\Models\BlogDB;
use Application\Views\View;

class BlogController
{
    public function showAction($params = [])
    {
        //подключаем модель для получения данных блога
        $model = new BlogDB();
        $data['news'] = $model->getPosts();
        //подключаем представление с нужным шаблоном
        $view = new View();
        $view->render('blog', $data);
    }
}