<?php
include_once "Dbh.php";
$dbh = new Dbh();
if (!empty($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["text"])) {
    $dbh->postComment($_GET["id"],$_POST["name"], $_POST["text"]);
}
header("Location: comments.php?id=".$_GET["id"],true,303);