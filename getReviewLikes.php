<?php
    include "checkSession.php";
    if (!checkSession()){
        header("Location: index.php");
        exit;
    }
    function getReviewLikes() {
        
        global $userid;

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $userid = mysqli_real_escape_string($conn, $_POST["username"]);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "SELECT USERNAME,NUMLIKE FROM GAME_REVIEWS WHERE USERNAME = '$userid' AND GAME_ID = '$id'";
        }else{
            $query = "SELECT USERNAME,NUMLIKE FROM MOVIE_REVIEWS WHERE USERNAME = '$userid' AND FILM_ID = '$id'";
        }
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($res);
        echo json_encode($row);
        mysqli_close($conn);
        exit;
    }
    
    getReviewLikes();
?>