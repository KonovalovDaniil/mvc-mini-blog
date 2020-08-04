<?php
namespace Engine\DB;

use PDO;

class DB
{
    private static $_instance = null;
    private $pdo;

    // для безопасности настройки лучше хранить в конфиг файле // for security is better to store the settings in the config file
    private static $host = '';
    private static $db = 'test-task';
    private static $user = 'root';
    private static $pass = '';
    private static $charset = 'utf8';

	private function __construct () {

        $this->pdo = new PDO(
            'mysql:host=' . self::$host . ';dbname=' . self::$db . ';charset=' . self::$charset,
            self::$user,
            self::$pass,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

    }

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
    {

        if(is_null(self::$_instance))
        {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public function getPDO()
    {
        return $this->pdo;
    }

}