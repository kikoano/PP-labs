<?php
include("Dbh.php");
$dbh = new Dbh();
if (!empty($_POST["submit"]) && !empty($_POST["title"]) && !empty($_POST["text"])) {
    $dbh->updateNews($_GET["id"], $_POST["title"], $_POST["text"]);
}
header("Location: admin.php",true,303);