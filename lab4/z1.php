<?php

function replace($filename,$resname,$replace=false){
    if( ($f = fopen($filename,"r")) && ($r = fopen($resname,"a"))) {
        $read = fread($f, filesize($filename));
        if($replace)
            $read = str_replace("-", " ", $read);
        fwrite($r, $read);
        fclose($r);
        fclose($f);
    }
}

replace("files/prva.txt","files/rezultat.txt",true);
replace("files/vtora.txt","files/rezultat.txt");