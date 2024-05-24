<?php
    session_start();

    function checkSession(){
        if(isset($_SESSION["username"]) || isset($_COOKIE["remember_me"])) {
            return $_SESSION["username"];
        }
         else return false;
    }

?>