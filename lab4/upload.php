<?php
if (!empty($_FILES["file"]["name"])){
    move_uploaded_file($_FILES["file"]["tmp_name"],"users/{$_FILES['file']['name']}");
    header("Location: z2.php?file={$_FILES['file']['name']}");
}
else
    header("Location: z2.php");