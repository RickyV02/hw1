<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function getReview() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "SELECT * FROM GAME_REVIEWS WHERE USERNAME = '$userid' AND GAME_ID = '$id'";
        }else{
            $query = "SELECT * FROM MOVIE_REVIEWS WHERE USERNAME = '$userid' AND FILM_ID = '$id'";
        }
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            echo json_encode(array('ok' => true,'content'=> $row));
        }else{
            echo json_encode(array('ok' => false));
        }
        mysqli_close($conn);
        exit;
    }
    
    getReview();
?>