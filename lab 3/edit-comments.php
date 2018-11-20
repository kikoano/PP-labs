<?php
include_once "Dbh.php";
$dbh = new Dbh();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit comments</title>
</head>
<body>
<h1>Edit comments</h1>
<table border=1>
    <tr>
        <th>Comment id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Approved</th>
        <th>Delete</th>
    </tr>
    <?php
    if (!empty($_GET["id"])) {
        $results = $dbh->getAllComments($_GET["id"]);
        foreach ($results as $val) {
            $approved = "Yes";
            if (!$val["approved"])
                $approved = "<a href='action-comment.php?action=approved&comment_id=$val[comment_id]&id=$_GET[id]'>Approve</a>";
            echo "<tr><td>$val[comment_id]</td><td>$val[author]</td><td>$val[comment]</td><td>" . $approved . "</td><td><a href =action-comment.php?action=delete&comment_id=$val[comment_id]&id=$_GET[id]>Delete</a></td></tr>";
        }
    }
    ?>
</table>
</body>
</html>