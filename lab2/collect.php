<?php
session_start();
if (isset($_GET["submit"])) {
    if (isset($_GET["ime"]) && !empty($_GET["ime"]) && isset($_GET["prezime"]) && !empty($_GET["prezime"]) &&
        isset($_GET["email"]) && !empty($_GET["email"]) && isset($_GET["pol"])) {
        $ime = $_GET["ime"];
        $prezime = $_GET["prezime"];
        $email = $_GET["email"];
        $pol = $_GET["pol"];
        if ($pol == "0")
            $pol = "Zensko";
        else
            $pol = "Masko";

        if (isset($_GET["rememberme"]))
            setcookie("user", $ime, time() + 7200);
        $sessionId = session_id();
        setcookie("id",$sessionId,time()+ 3600);
        $_SESSION["user"] = $ime;
        $_SESSION["LAST_ACTIVITY"] = time();

        echo "$ime $prezime <br>";
        echo "$email<br>";
        echo "$pol<br>";
    }
    else
    echo "Greska pri vnes. </br>";
}
$ime = $_SESSION["user"];
if (isset($_SESSION['LAST_ACTIVITY']) && isset($_COOKIE["id"]) && (time() - $_SESSION['LAST_ACTIVITY'] < 3600)) {
    echo "Hello " . $ime . ", you are still logged in!!!!</br> ";
}