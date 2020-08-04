<?php
namespace Application\Controllers;

use Application\Models\AuthorDB;
use Application\Views\View;

class AuthorController
{
    public function showAction($params = [])
    {
        $id = $params['author_id'];

        //получаем посты автора по его id
        $modelPost = new AuthorDB();
        $data['news'] = $modelPost->getAuthorPosts($id);
        $data['authorName'] = $modelPost->getNameAuthor($id);

        //подключаем представление с нужным шаблоном
        $view = new View();
        $view->render('author', $data);
    }
}