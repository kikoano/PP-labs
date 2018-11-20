<?php
include_once "Dbh.php";
$dbh = new Dbh();
if (!empty($_GET["id"])) {
    $dbh->deleteNews($_GET["id"]);
}
header("Location: admin.php",true,303);