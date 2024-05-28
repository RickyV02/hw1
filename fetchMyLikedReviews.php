<?php
    include "checkSession.php";
    if (!checkSession()){
        header("Location: index.php");
        exit;
    }
    function fetchMyLikedReviews() {

        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $_GET["q"]);
        $response = array();

        $query = "SELECT MOVIE_REVIEWS.ID,MOVIE_REVIEWS.USERNAME,FILM_ID,FILM_NAME,RECENSIONE,VOTO,COVER,AVATAR FROM MOVIEREVIEW_LIKES JOIN MOVIE_REVIEWS ON MOVIEREVIEW_LIKES.REVIEW_ID = MOVIE_REVIEWS.ID JOIN ACCOUNTS ON MOVIE_REVIEWS.USERNAME = ACCOUNTS.USERNAME WHERE MOVIEREVIEW_LIKES.USERNAME = '$userid'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
                $response[]=$row;
            }
        }

        $query = "SELECT GAME_REVIEWS.ID,GAME_REVIEWS.USERNAME,GAME_ID,GAME_NAME,RECENSIONE,VOTO,COVER,AVATAR FROM GAMEREVIEW_LIKES JOIN GAME_REVIEWS ON GAMEREVIEW_LIKES.REVIEW_ID = GAME_REVIEWS.ID JOIN ACCOUNTS ON GAME_REVIEWS.USERNAME = ACCOUNTS.USERNAME WHERE GAMEREVIEW_LIKES.USERNAME = '$userid'";  
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

    fetchMyLikedReviews();
?>