<?php
    include "checkSession.php";
    if (!checkSession()){
        header("Location: index.php");
        exit;
    }
    function fetchMyReviews() {

        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $_GET["q"]);
        $response = array();
        
        $query = "SELECT MOVIE_REVIEWS.ID,AVATAR,ACCOUNTS.USERNAME,FILM_ID,FILM_NAME,RECENSIONE,VOTO,COVER FROM MOVIE_REVIEWS JOIN ACCOUNTS ON MOVIE_REVIEWS.USERNAME = ACCOUNTS.USERNAME WHERE ACCOUNTS.USERNAME = '$userid'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
                $response[]=$row;
            }
        }
        
        $query = "SELECT GAME_REVIEWS.ID,AVATAR,ACCOUNTS.USERNAME,GAME_ID,GAME_NAME,RECENSIONE,VOTO,COVER FROM GAME_REVIEWS JOIN ACCOUNTS ON GAME_REVIEWS.USERNAME = ACCOUNTS.USERNAME WHERE ACCOUNTS.USERNAME = '$userid'";  
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
                $response[]=$row;
            }
        }

        if(count($response)==0){
            echo json_encode(array('norev' => true));
        }else{
            echo json_encode($response);
        }
        
        mysqli_close($conn);
        exit;
        
    }

    fetchMyReviews();
?>