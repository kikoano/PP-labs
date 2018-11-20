<?php
include("Dbh.php");
$dbh = new Dbh();
$title = "";
$text = "";
if (!empty($_GET["id"])) {
    $res = $dbh->getNews($_GET["id"]);
    $title = $res[0]["news_title"];
    $text = $res[0]["full_text"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>
<h1>Edit</h1>

</table>
<form action="edit-post.php?id=<?php echo $_GET["id"]; ?>" method="post">
    <table>
        <tr>
            <td>Naslov na novosta</td>
            <td><input type="text" name="title" value="<?php echo $title ?>"</td>
        </tr>
        <tr>
            <td>Celosen text na novosta</td>
            <td><textarea rows="5" cols="50" type="text" name="text"><?php echo $text ?></textarea></td>
        </tr>
    </table>
    <input type="submit" name="submit">
</form>
</body>
</html>