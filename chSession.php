<?php
if(session_status() == PHP_SESSION_NONE)
    session_start();

$scriptName = basename($_SERVER['SCRIPT_FILENAME']);
if(!empty($_SESSION['fKey'])){
    if($scriptName == "index.php" || $scriptName == "register.php")
    {
        header("Location: vote.php");
        exit();
    }

} else {
    if($scriptName == "vote.php") {
        header("Location: index.php");
        exit();
    }
}