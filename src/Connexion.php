<?php


class Connexion{
    public static Connexion | null $_instance = null;
    private PDO $_pdo;

    private function __construct () {
        try {
            $base_url = "mysql:host=%s;dbname=%s;charset=utf8";
            $url = sprintf($base_url, 'chatDb', 'chat');
            $this->_pdo = new PDO($url, 'test', 'test');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getPDO (): PDO {
        return $this->_pdo;
    }

    public static function getInstance (): ?PDO {
        if (is_null(self::$_instance)) {
            self::$_instance = new Connexion();
        }
        return self::$_instance->getPDO();
    }

}