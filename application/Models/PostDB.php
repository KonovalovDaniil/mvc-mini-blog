<?php
namespace Application\Models;

use Engine\DB\DB;

class PostDB
{
    public function getPost($id)
    {
        $pdo = DB::getInstance()->getPDO();
        $sql = 'SELECT news.id, news.publish_date, news.title, news.text, authors.id `author_id`, authors.name `author_name`
                FROM news
                INNER JOIN authors ON news.id = ? AND authors.id = news.author_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $oneNews = $stmt->fetch();
        return $oneNews;
    }
}