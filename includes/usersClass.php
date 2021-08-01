<?php

class usersClass
{
    private $connection;
    private $server = SERVER;
    private $dbname = DBNAME;
    private $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    public function __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host=$this->server;dbname=$this->dbname",
                DBUSER,
                DBPASS,
                $this->options
            );
        } catch (PDOException $e) {
            echo 'Error connecting the database, ' . $e->getMessage();
        }
    }

    public function login($username, $password) {
        try {
            $query = $this->connection->prepare("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

            $query->execute();
            $user = $query->fetch();
            if(!empty($user)) {
                session_start();
                $_SESSION['user'] = $user;
                return $user;
            } else {
                echo 'Error when logging.';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function logout() {
        if(session_status() == PHP_SESSION_NONE) session_start();
        session_unset();
        session_destroy();
    }

    public static function check() {
        if(session_status() == PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['user'])) return true;
        return false;
    }
}