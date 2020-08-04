<?php
namespace Application\Models;

use Engine\DB\DB;

class AuthorDB
{
    public function getAuthorPosts($id)
    {
        $pdo = DB::getInstance()->getPDO();
        $sql = 'SELECT news.id, news.publish_date, news.title, news.text, authors.id `author_id`, authors.name `author_name`
                FROM news
                INNER JOIN authors ON authors.id = ? AND authors.id = news.author_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $authorPosts = $stmt->fetchall();
        return $authorPosts;
    }

    public function getNameAuthor($id)
    {
        $pdo = DB::getInstance()->getPDO();
        $sql = 'SELECT name FROM authors WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $authorName = $stmt->fetch();
        return $authorName['name'];
    }

}