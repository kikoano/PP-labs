<?php
#3.1
$num = array(2,5,6,10,41,24,32,9,16,19);
$asc = array("Kristijan" => "Kristijan", "Trajkovski" => "Trajkovski" ,"Skopje" => "Skopje");
$multi = array(array(1,2,3),array(4,5,6),array(7,8,9));
#3.2 i #3.3
$pogolemi = array();
for($i=0;$i<count($num);$i++){
    echo $num[$i]." ";
}
echo "<br>";
foreach ($num as $elem){
    echo $elem." ";
    if($elem > 20)
        array_push($pogolemi,$elem);
}
echo "<br>";
print_r($pogolemi);
echo "<br>";
#3.4
echo "min: ".min($num)."<br>";
echo "max: ".max($num)."<br>";
#3.5
$text = "Here is some random text";
$ar1 = explode(" ",$text);
$ar2 = array();
foreach ($ar1 as $elem){
    $ar2[$elem]=strlen($elem);
}
print_r($ar2);