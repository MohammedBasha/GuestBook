<?php

class messagesClass
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

    public function addMessage(message $m) {
        $title      = $m->getTitle();
        $message    = $m->getMessage();
        $name       = $m->getName();
        $email      = $m->getEmail();
        $phone      = $m->getPhone();
        $published  = $m->getPublished();

        try {
            $query = $this->connection->prepare("INSERT INTO messages(title, message, name, email, phone, published, date) VALUES (?, ?, ?, ?, ?, ?, NOW())");

            $query->execute([$title, $message, $name, $email, $phone, $published]);
            return true;
        } catch (PDOException $e) {
            echo 'Error Inserting data, ' . $e->getMessage();
        }
    }

    public function getMessages($extras = null) {
        try {
            $query = $this->connection->prepare("SELECT * FROM messages $extras");

            $query->execute();
            return $query->fetchAll();

        } catch (PDOException $e) {
            echo 'Error fetching data, ' . $e->getMessage();
        }
    }

    public function getMessage($id) {
        $query = $this->getMessages("WHERE id = $id");
        return count($query) > 0? $query[0] : [];
    }

    public function searchMessages($keyword) {
        return $this->getMessages("WHERE title LIKE '%$keyword%' OR message LIKE '%$keyword%'");
    }

    public function getMessagesByStatus($published = 1) {
        return $this->getMessages("WHERE published = $published");
    }

    public function updateMessage(message $m) {
        $id         = $m->getId();
        $title      = $m->getTitle();
        $message    = $m->getMessage();
        $published  = $m->getPublished();

        try {
            $query = $this->connection->prepare("UPDATE messages SET title = ?, message = ?, published = ? WHERE id = ?");

            $query->execute([$title, $message, $published, $id]);
            return true;
        } catch (PDOException $e) {
            echo 'Error Updating data, ' . $e->getMessage();
        }
    }

    public function deleteMessage($id) {
        if ($this->getMessage($id)) {
            try {
                $query = $this->connection->prepare("DELETE FROM messages WHERE id = ?");

                $query->execute([$id]);
                return true;
            } catch (PDOException $e) {
                echo 'Error Deleting data, ' . $e->getMessage();
            }
        } else {
            throw new Exception('This message not found');
        }

    }
}