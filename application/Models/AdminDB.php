<?php
namespace Application\Models;


use Engine\DB\DB;

class AdminDB
{

    public function getPosts()
    {
        //DB::getInstance();
        $pdo = DB::getInstance()->getPDO();
        $stmt = $pdo->query('SELECT * FROM news');
        $data = $stmt->fetchAll();
        return $data;
    }

    public function delPost($params)
    {
        $post_id = $params['post_id'];
        //DB::getInstance();
        $pdo = DB::getInstance()->getPDO();
        $stmt = $pdo->prepare("DELETE FROM `news` WHERE `id` = :post_id");
        $stmt->execute(['post_id' => $post_id]);
    }

}