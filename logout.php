<?php
    session_start();
    session_unset();
    session_destroy();
        if (isset($_COOKIE["remember_me"])) {
            $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ". mysqli_connect_error());
            $tokenData=$_COOKIE["remember_me"];
            $token = mysqli_real_escape_string($conn, $tokenData);
            $query = "DELETE FROM USER_TOKENS WHERE TOKEN = '$token'";
            if(mysqli_query($conn, $query)){
                setcookie("remember_me", "");
            }
            mysqli_close($conn);
        }
    header("Location: index.php");
    exit;
?>