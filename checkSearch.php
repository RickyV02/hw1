<?php
session_start();

function checkSearch(){
    if(isset($_SESSION["search"])) {
        $searchData = $_SESSION["search"];
        echo json_encode(array('search' => $searchData));
    } else {
        return false;
    }
}

checkSearch();
?>