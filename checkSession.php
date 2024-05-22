<?php
    session_start();

    function checkSession(){
        if(isset($_SESSION["username"])) {
            return $_SESSION["username"];
        }
         else return false;
    }

?>