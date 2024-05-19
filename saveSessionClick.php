<?php

session_start();

function saveClick(){
    $_SESSION["search"]=$_GET["q"];
    header("Location: result.php");
    exit;
}

saveClick();
?>