<html>
<head>
    <style>
        table, td, th{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit">
</form>
<?php
include_once 'User.php';
session_start();
if (!empty($_GET["file"])) {
    ?>
    <form method="post">
        <input type="submit" name="show" value="Show">
    </form>
    <form method="post">
        <input type="submit" name="validate" value="Validate">
    </form>
    <?php
}
else {
    unset($_SESSION["show"]);
    unset($_SESSION["users"]);
}
if (!empty($_POST["show"])|| !empty($_SESSION["show"])) {
    if ($file = fopen("users/{$_GET["file"]}", "r")) {
        $_SESSION["show"]="show";
        $read = fread($file,filesize("users/{$_GET["file"]}"));
        $tmp = explode(";", $read);
        $classTmp = array();
        for ($i = 0; $i < sizeof($tmp); $i += 5) {
            array_push($classTmp,new User($tmp[$i], $tmp[$i + 1], $tmp[$i + 2], $tmp[$i + 3], $tmp[$i + 4]));
        }
        $_SESSION["users"] = $classTmp;
        fclose($file);
        ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
            <?php
            foreach($classTmp as $item){
                echo "<tr><td>{$item->getName()}</td><td>{$item->getSurname()}</td><td>{$item->getPhone()}</td><td>{$item->getEmail()}</td><td>{$item->getAddress()}</td></tr>";
            } ?>
        </table>

<?php
    }
}
if(!empty($_POST["validate"]) && !empty($_SESSION["show"])){
    $file=fopen("log.txt","a");
    foreach ($_SESSION["users"] as $user){
        if(!filter_var($user->getEmail(),FILTER_VALIDATE_EMAIL)){
            $msg = date("Y/m/d/h:i").": User: {$user->getName()} {$user->getSurname()} has invalid email {$user->getEmail()}\n";
            fwrite($file,$msg);
        }
    }
    fclose($file);
}
?>
</body>
</html>
