<?php
include_once "Dbh.php";
$dbh = new Dbh();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
</head>
<body>
<h1>Comments</h1>
<table border=1>
    <tr>
        <th>Comment id</th>
        <th>Author</th>
        <th>Comment</th>
    </tr>
    <?php
    if (!empty($_GET["id"])) { //for what article
        $results = $dbh->getAllApprovedComments($_GET["id"]);
        foreach ($results as $val) {
            echo "<tr><td>$val[comment_id]</td><td>$val[author]</td><td>$val[comment]</td></tr>";
        }
    }
    ?>
</table>
<br>
<form action="post-comment.php?id=<?php echo $_GET["id"]; ?>" method="post">
    <table>
        <tr>
            <td>Ime</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Tekst</td>
            <td><textarea rows="5" cols="50" type="text" name="text"></textarea></td>
        </tr>
    </table>
    <input type="submit" name="submit">
</form>
</body>
</html>