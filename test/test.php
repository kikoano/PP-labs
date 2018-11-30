<?php
session_start();
if (!empty($_POST["submit"])) {
    if (empty($_SESSION["list"])) {
        $_SESSION["list"]=array();
    }
    array_push($_SESSION["list"],$_POST["text"]);
    header("Location: test.php");
}
?>
<html>
<head>

</head>
<body>
<ul>
    <?php
    if (!empty($_SESSION["list"])) {
        foreach ($_SESSION["list"] as $value)
            echo "<li>{$value}</li>";
    }
    ?>
</ul>
<form method="post">
    <input type="text" name="text">
    <input type="submit" name="submit">
</form>
</body>
</html>

