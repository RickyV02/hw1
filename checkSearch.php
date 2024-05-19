<?php
session_start();

function checkSearch(){
    if(isset($_SESSION["search"])) {
        echo json_encode($_SESSION["search"]);
    } else {
        return false;
    }
}

checkSearch();
?>