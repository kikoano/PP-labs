<?php
include_once "Dbh.php";
$dbh = new Dbh();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Full News</title>
</head>
<body>
<?php
if(!empty($_GET["id"])){
    $res = $dbh->getNews($_GET["id"])[0];
    echo "<h1>$res[news_title]</h1><p>$res[full_text]</p>";
}
?>
</body>
</html>