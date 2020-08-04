<?php
namespace Application\Controllers;

use Application\Models\AdminDB;
use Application\Views\View;

class AdminController
{

    public function showAction($params = [])
    {
        //подключаем модель для получения данных
        $model = new AdminDB();
        $data['news'] = $model->getPosts();
        //подключаем представление с нужным шаблоном
        $view = new View();
        $view->render('admin', $data);
    }

    public function deletePostAction($post_id)
    {
        //подключаем модель для получения данных
        $model = new AdminDB();
        $model->delPost($post_id);
        header('Location: /admin');
        exit;
    }

}