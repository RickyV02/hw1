<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function getNumLikes() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "SELECT COUNT(*) AS NUMREVIEWS FROM GAME_REVIEWS WHERE GAME_ID = '$id'";
        }else{
            $query = "SELECT COUNT(*) AS NUMREVIEWS FROM MOVIE_REVIEWS WHERE FILM_ID = '$id'";
        }
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($res);
        echo json_encode(['info' => $row['NUMREVIEWS']]);
        mysqli_close($conn);
        exit;
    }
    
    getNumLikes();
?>