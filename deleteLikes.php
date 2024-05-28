<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function saveLike() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "DELETE FROM GAME_LIKES WHERE USERNAME = '$userid' AND GAME_ID = '$id'";
        }else{
            $query = "DELETE FROM MOVIE_LIKES WHERE USERNAME = '$userid' AND FILM_ID = '$id'";
        }
        
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => false));
        }else{
            echo json_encode(array('ok' => true));
        }
        mysqli_close($conn);
        exit;
    }

    saveLike();
?>