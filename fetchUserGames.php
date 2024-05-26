<?php
    include "checkSession.php";
    if (!checkSession()){
        header("Location: index.php");
        exit;
    }
    function getUserGames() {

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $username = mysqli_real_escape_string($conn, $_GET["q"]);
        
        $query = "SELECT * FROM GAME_LIKES WHERE USERNAME = '$username'";
     
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            $response=array();
            while($row = mysqli_fetch_assoc($res)) {
                $response[]=$row;
            }
            echo json_encode($response);
        }else{
            echo json_encode(array('nouser' => true));
        }
        mysqli_close($conn);
        exit;
    }

    getUserGames();
?>