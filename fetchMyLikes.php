<?php
    include "checkSession.php";
    if (!checkSession()){
        header("Location: index.php");
        exit;
    }
    function fetchNL() {

        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $username = mysqli_real_escape_string($conn, $_GET["q"]);
        $query = "SELECT COUNT(*) AS LIKES FROM MOVIE_LIKES WHERE USERNAME = '$username'";
     
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $count = $row["LIKES"];
            $query = "SELECT COUNT(*) AS LIKES FROM GAME_LIKES WHERE USERNAME = '$username'";

            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if(mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $count+= $row["LIKES"];
                echo json_encode(array('likes' => $count));
            }else{
                echo json_encode(array('nolikes' => true));
            }
        }
        mysqli_close($conn);
        exit;
    }

    fetchNL();
?>