<?php
include_once ("DB.php");
?>
<html>
<head>
</head>
<body>
<?php
$channels=DB::getAllChannels();
foreach ($channels as $channel){
    echo "<a href='channel.php?channel-id={$channel["id"]}'>{$channel["name"]}-{$channel["description"]} num_unread:{$channel["num_unread"]}</a><br>";
}
?>
</body>
</html>
