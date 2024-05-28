<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function saveReview() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $cover = mysqli_real_escape_string($conn, $_POST["cover"]);
        $rating= mysqli_real_escape_string($conn, $_POST["rating"]);
        $review= mysqli_real_escape_string($conn, $_POST["review"]);
        if(is_numeric($id)){
            $query = "INSERT INTO GAME_REVIEWS (USERNAME, GAME_ID, GAME_NAME, RECENSIONE, VOTO, COVER) VALUES('$userid','$id','$name','$review','$rating','$cover')";
        }else{
            $query = "INSERT INTO MOVIE_REVIEWS (USERNAME, FILM_ID, FILM_NAME, RECENSIONE, VOTO, COVER) VALUES('$userid','$id','$name','$review','$rating','$cover')";
        }
        
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
        }else{
            echo json_encode(array('ok' => false));
        }
        mysqli_close($conn);
        exit;
    }

    saveReview();
?>