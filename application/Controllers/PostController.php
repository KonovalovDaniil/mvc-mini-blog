<?php
namespace Application\Controllers;

use Application\Models\AuthorDB;
use Application\Models\PostDB;
use Application\Views\View;

class PostController
{
    public function showAction($params = [])
    {
        $id = $params['post_id'];

        //получаем данные поста по его id
        $modelPost = new PostDB();
        $data['news'] = $modelPost->getPost($id);

        //подключаем представление с нужным шаблоном
        $view = new View();
        $view->render('post', $data);
    }
}