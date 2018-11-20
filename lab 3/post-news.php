<?php
include_once "Dbh.php";
$dbh = new Dbh();
if (!empty($_POST["submit"]) && !empty($_POST["title"]) && !empty($_POST["text"])) {
    $dbh->postNews($_POST["title"], $_POST["text"]);
}
header("Location: admin.php",true,303);
