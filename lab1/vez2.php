<?php
#2.1
$ime = "Kristijan";
$prezime = "Trajkovski";
echo "$ime $prezime";
echo "<br>";
#2.2
$text = "some random short text example.";
#pretvaranje na site bukvi vo golemi
echo strtoupper($text);
echo "<br>";
#pretvaranje na site bukvi vo mali
echo strtolower($text);
echo "<br>";
#pretvaranje na prvata bukva vo golema
echo ucfirst($text);
echo "<br>";
#pretvaranje na sekoja prva bukva na sekoj zbor vo golema
echo ucwords($text);
echo "<br>";
#2.3
$arr = array("programski", "praktikum", "laboratoriski", "vezbi");
echo implode(" ",$arr);