<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function saveEditReview() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $rating= mysqli_real_escape_string($conn, $_POST["rating"]);
        $review= mysqli_real_escape_string($conn, $_POST["review"]);
        if(is_numeric($id)){
            $query = "UPDATE GAME_REVIEWS SET RECENSIONE = '$review', VOTO = '$rating' WHERE USERNAME = '$userid' AND GAME_ID = '$id'";
        }else{
            $query = "UPDATE MOVIE_REVIEWS SET RECENSIONE = '$review', VOTO = '$rating' WHERE USERNAME = '$userid' AND FILM_ID = '$id'";
        }
        
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
        }else{
            echo json_encode(array('ok' => false));
        }
        mysqli_close($conn);
        exit;
    }

    saveEditReview();
?>