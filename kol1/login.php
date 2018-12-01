<?php
if(!empty($_POST["username"]) && !empty($_POST["email"])){
    setcookie("username",$_POST["username"]);
    setcookie("email",$_POST["email"]);
    setcookie("last_access",time());

    header("Location: channels.php");
}