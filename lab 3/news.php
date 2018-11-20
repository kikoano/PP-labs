<?php
include_once "Dbh.php";
$dbh = new Dbh();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
</head>
<body>
<h1>News</h1>
<table border=1>
    <tr>
        <th>News id</th>
        <th>Data</th>
        <th>News title</th>
        <th>News Article</th>
        <th>Comments</th>
    </tr>
    <?php
    $results = $dbh->getNewest5News();
    foreach ($results as $val) {
        $text = substr($val["full_text"],0,100);
        if(strlen($val["full_text"])>100)
            $text.= "&nbsp;&nbsp;&nbsp;&nbsp;<a href='full-news.php?id=$val[news_id]'>More!</a>";
        //substr($big, 0, 100);
        echo "<tr><td>$val[news_id]</td><td>$val[date]</td><td>$val[news_title]</td><td>$text</td><td><a href=comments.php?id=$val[news_id]>Comments(" . $dbh->getCommentsCountApproved($val["news_id"]) . ")</a></td></tr>";
    }
    ?>
</table>
</body>
</html>