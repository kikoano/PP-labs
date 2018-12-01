<?php
include_once "DB.php";
if (empty($_GET["channel-id"]))
    die();
?>
<html>
<head>
</head>
<body>
<?php
$messages = DB::getMessages($_GET["channel-id"]);
foreach ($messages as $message) {
    if($message["sender_username"]!= $_COOKIE["username"] && $message["is_unread"] == 1)
        DB::readMessage($message["id"]);
    echo "<div>User: {$message["sender_username"]} Time: {$message["time_sent"]} Message: {$message["message_text"]}</div>";
}
?>
<br>
<form action="send.php?channel-id=<?= $_GET["channel-id"] ?>" method="post">
    Username: <input type="text" name="username" value="<?= $_COOKIE['username'] ?>"><br>
    <textarea maxlength="200" name="message"></textarea><br>
    <input type="submit">
</form>
</body>
</html>
