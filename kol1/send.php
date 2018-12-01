<?php
include_once "DB.php";
if(!empty($_GET["channel-id"]) && !empty($_POST["username"]) && !empty($_POST["message"])){
    if(count($_POST["message"])<200){
        setcookie("channelUser",$_POST["username"]);
        DB::submitMessage($_GET["channel-id"],$_POST["message"]);
    }

}
header("Location: channel.php?channel-id={$_GET["channel-id"]}");