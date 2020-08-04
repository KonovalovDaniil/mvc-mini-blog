<?php
namespace Application\Models;

use Engine\DB\DB;

class BlogDB
{
    public function getPosts()
    {
        //DB::getInstance();
        $pdo = DB::getInstance()->getPDO();
        $stmt = $pdo->query('SELECT * FROM news');
        $data = $stmt->fetchAll();
        return $data;

    }

}