<?php
    include "checkSession.php";
    if (!checkSession()){
        header("Location: index.php");
        exit;
    }
    function getUserAvatar() {

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $username = mysqli_real_escape_string($conn, $_GET["q"]);
        
        $query = "SELECT * FROM ACCOUNTS WHERE USERNAME = '$username'";
     
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            echo json_encode($row);
        }else{
            echo json_encode(array('nouser' => true));
        }
        mysqli_close($conn);
        exit;
    }

    getUserAvatar();
?>