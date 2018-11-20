<?php
include_once "Dbh.php";
$dbh = new Dbh();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Admin Panel</title>
</head>
<body>
<h1>News Admin Panel</h1>
<table border=1>
    <tr>
        <th>News id</th>
        <th>Data</th>
        <th>News title</th>
        <th>News Article</th>
        <th>Edit comments</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $results = $dbh->getAllNews();
    foreach ($results as $val) {
        echo "<tr><td>$val[news_id]</td><td>$val[date]</td><td>$val[news_title]</td><td>$val[full_text]</td><td><a href=edit-comments.php?id=$val[news_id]>New comments(" . $dbh->getNewComments($val["news_id"]) . ")</a></td><td><a href =edit.php?id=$val[news_id]>Edit</a></td><td><a href =delete-post.php?id=$val[news_id]>Delete</a></td></tr>";
    }
    ?>
</table>
<br>
<form action="post-news.php" method="post">
    <table>
        <tr>
            <td>Naslov na novosta</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Celosen text na novosta</td>
            <td><textarea rows="5" cols="50" type="text" name="text"></textarea></td>
        </tr>
    </table>
    <input type="submit" name="submit">
</form>
</body>
</html>