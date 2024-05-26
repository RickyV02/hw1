<?php
    include "checkSession.php";
    if (!checkSession()){
        header("Location: index.php");
        exit;
    }
    function fetchRC() {

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $username = mysqli_real_escape_string($conn, $_GET["q"]);
        $query = "SELECT COUNT(*) AS REVIEWS FROM MOVIE_REVIEWS WHERE USERNAME = '$username'";
     
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $count = $row["REVIEWS"];
            $query = "SELECT COUNT(*) AS REVIEWS FROM GAME_REVIEWS WHERE USERNAME = '$username'";

            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if(mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $count+= $row["REVIEWS"];
                echo json_encode(array('rev' => $count));
            }else{
                echo json_encode(array('norev' => true));
            }
        }
        mysqli_close($conn);
        exit;
    }

    fetchRC();
?>