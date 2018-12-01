<?php
$username=NULL;
$email=NULL;
if(isset($_COOKIE["last_access"])) {
    $last_access = $_COOKIE["last_access"];
    if(time()-$last_access < 7200){
        header("Location: channels.php");
    }
    else{
        $username = $_COOKIE["username"];
        $email = $_COOKIE["email"];
    }
}
?>
<html>
<head>
</head>
<body>
<form action="login.php" method="post">
    Username:<input type="text" name="username" value="<?=$username?>"><br>
    Email:<input type="text" name="email" value="<?=$email?>">
    <input type="submit" value="Login">
</form>
</body>
</html>
