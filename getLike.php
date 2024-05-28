<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function getLike() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "SELECT * FROM GAME_LIKES WHERE USERNAME = '$userid' AND GAME_ID = '$id'";
        }else{
            $query = "SELECT * FROM MOVIE_LIKES WHERE USERNAME = '$userid' AND FILM_ID = '$id'";
        }
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            echo json_encode(array('ok' => true));
        }else{
            echo json_encode(array('ok' => false));
        }
        mysqli_close($conn);
        exit;
    }

    getLike();
?>