<?php
#1.1
$num = array(2,5,6,10,41,24,32,9,16,19);
$asc = array("Kristijan" => "Kristijan", "Trajkovski" => "Trajkovski" ,"Skopje" => "Skopje");
$multi = array(array(1,2,3),array(4,5,6),array(7,8,9));
#1.2 i #1.3
$pogolemi = array();
foreach ($num as $elem){
    echo $elem." ";
    if($elem > 20)
        array_push($pogolemi,$elem);
}
echo "<br>";
print_r($pogolemi);
echo "<br>";
#1.4
$text = "Here is some random text";
$ar1 = explode(" ",$text);
$ar2 = array();
foreach ($ar1 as $elem){
    $ar2[$elem]=strlen($elem);
}
print_r($ar2);