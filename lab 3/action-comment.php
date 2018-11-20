<?php
include_once "Dbh.php";
$dbh = new Dbh();

if (!empty($_GET["action"]) && !empty($_GET["comment_id"])) {
    if ($_GET["action"] == "delete")
        $dbh->deleteComment($_GET["comment_id"]);
    else if ($_GET["action"] == "approved")
        $dbh->approveComment($_GET["comment_id"]);
}
header("Location: edit-comments.php?id=".$_GET["id"],true,303);
