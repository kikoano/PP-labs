<?php
/**
 * Created by PhpStorm.
 * User: kikoano111
 * Date: 30/11/2018
 * Time: 22:48
 */

class DB
{
    private static $pdo = null;
    private static $user = "newuser";
    private static $pass = "password";
    private static $db = "chat";
    private static $host = "localhost";

    private function __construct()
    {
    }

    private static function PDO()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db . ";", self::$user, self::$pass);
            } catch (Exception $e) {
                echo "Error message: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    public static function getAllChannels()
    {
        try {
            $ps = self::PDO()->prepare(<<<HERE
SELECT channels.id as id, 
       channels.name as name,
       channels.description as description,
       SUM(messages.is_unread) as num_unread
FROM channels LEFT JOIN messages             
    on channels.id = messages.channel
GROUP BY channels.id
ORDER BY num_unread DESC;

HERE
            );
            $ps->execute();
            return $ps->fetchAll();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public static function getMessages($id)
    {
        try {
            $ps = self::PDO()->prepare("SELECT * FROM messages WHERE channel = ? ORDER BY time_sent DESC ");
            $ps->execute([$id]);
            return $ps->fetchAll();
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }

    public static function submitMessage($id,$message)
    {
        try {
            $ps = self::PDO()->prepare(<<<HERE
INSERT INTO messages (message_text, sender_username, sender_email, channel, time_sent, is_unread)
VALUES (?,?,?,?,NOW(),?)
HERE
);
            $ps->execute([$message,$_COOKIE["username"],$_COOKIE["email"],$id,1]);
        } catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }
    }
    public static function readMessage($id){
        try{
            $ps = self::PDO()->prepare("UPDATE messages SET is_unread = 0 WHERE id = ?");
            $ps->execute([$id]);
        }
        catch (Exception $e) {
            echo "Error message: " . $e->getMessage();
        }

    }
}