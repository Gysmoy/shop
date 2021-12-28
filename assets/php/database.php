<?php

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct(){
        $this->host = '185.212.70.1';
        $this->db = 'u142416532_hostingerdb';
        $this->user = 'u142416532_hostingeruser';
        $this->password = 'hP$4eJYNBn6';
        $this->charset = 'utf8mb4';
    }
    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error de  conexión: ' . $e->getMessage());
        }
    }
}

?>