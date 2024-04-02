<?php


class Connexion{
    public static Connexion | null $_instance = null;
    private PDO $_pdo;
   

    private function __construct () {
        $env = parse_ini_file(__DIR__ . '/../.env');
        $db_address=$env['DATABASE_ADDRESS'];
        $db_user=$env['USER'];
        $db_pass=$env['PASSWORD'];
        $db_name=$env['DATABASE_NAME'];
        try {
            $base_url = "mysql:host=%s;dbname=%s;charset=utf8";
            $url = sprintf($base_url, $db_address, $db_name);
            $this->_pdo = new PDO($url, $db_user, $db_pass);
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