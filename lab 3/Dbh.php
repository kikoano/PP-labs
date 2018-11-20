<?php

class Dbh
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $opt;
    private $pdo;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "newuser";
        $this->password = "password";
        $this->dbname = "praktikum";
        $this->opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");

        $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname;
        $this->pdo = new PDO($dsn, $this->username, $this->password, $this->opt);
    }

    public function getAllNews()
    {
        try {
            $ps = $this->pdo->prepare("SELECT * FROM `news`");
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function getNewest5News()
    {
        try {
            $ps = $this->pdo->prepare("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 5");
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function getNews($id)
    {
        try {
            $ps = $this->pdo->prepare("SELECT * FROM `news` WHERE `news_id` = ?");
            $ps->execute([$id]);
            return $ps->fetchAll();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function postNews($title, $text)
    {
        try {
            $ps = $this->pdo->prepare("INSERT INTO `news` (`date`,`news_title`,`full_text`) VALUES (?,?,?)");
            $ps->execute([date("Y-m-d H:i:s"), $title, $text]);
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function updateNews($id, $title, $text)
    {
        try {
            $ps = $this->pdo->prepare("UPDATE `news` SET `date` = ?, `news_title` = ?, `full_text` = ? WHERE `news_id` = ?");
            $ps->execute([date("Y-m-d H:i:s"), $title, $text, $id]);
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function deleteNews($id)
    {
        try {
            $ps = $this->pdo->prepare("DELETE FROM `news` WHERE `news_id` = ?");
            $ps->execute([$id]);
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function getNewComments($id)
    {
        try {
            $ps = $this->pdo->prepare("SELECT COUNT(*) FROM `comments` WHERE `news_id` = ? AND `approved` = 0");
            $ps->execute([$id]);
            return $ps->fetchColumn();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function getCommentsCount($id)
    {
        try {
            $ps = $this->pdo->prepare("SELECT COUNT(*) FROM `comments` WHERE `news_id` = ?");
            $ps->execute([$id]);
            return $ps->fetchColumn();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }
    public function getCommentsCountApproved($id)
    {
        try {
            $ps = $this->pdo->prepare("SELECT COUNT(*) FROM `comments` WHERE `news_id` = ? AND `approved` = 1");
            $ps->execute([$id]);
            return $ps->fetchColumn();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function getAllComments($id)
    {
        try {
            $ps = $this->pdo->prepare("SELECT * FROM `comments` WHERE `news_id` = ?");
            $ps->execute([$id]);
            return $ps->fetchAll();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function getAllApprovedComments($id)
    {
        try {
            $ps = $this->pdo->prepare("SELECT * FROM `comments` WHERE `news_id` = ? AND `approved` = 1");
            $ps->execute([$id]);
            return $ps->fetchAll();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function deleteComment($id)
    {
        try {
            $ps = $this->pdo->prepare("DELETE FROM `comments` WHERE `comment_id` = ?");
            $ps->execute([$id]);
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function approveComment($id)
    {
        try {
            $ps = $this->pdo->prepare("UPDATE `comments` SET `approved` = 1 WHERE `comment_id` = ?");
            $ps->execute([$id]);
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public function postComment($id, $name, $comment)
    {
        try {
            $ps = $this->pdo->prepare("INSERT INTO `comments` (`news_id`,`author`,`comment`) VALUES (?,?,?)");
            $ps->execute([$id, $name, $comment]);
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }
}