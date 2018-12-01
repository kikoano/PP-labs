<?php
if (!empty($_POST["processTxt"])) {
    $sum = 0;
    $text = $_POST["processTxt"];
    $arr = explode(" ",$text);
    foreach ($arr as $word){
        if(strpos($word,"$")){
            $sum += filter_var($word,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        }
    }
    echo $sum;
}