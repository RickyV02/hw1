<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function getNumLikes() {
        
        global $userid;

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "SELECT COUNT(*) AS NUMLIKE FROM GAME_LIKES WHERE GAME_ID = '$id'";
        }else{
            $query = "SELECT COUNT(*) AS NUMLIKE FROM MOVIE_LIKES WHERE FILM_ID = '$id'";
        }
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($res);
        echo json_encode(['info' => $row['NUMLIKE']]);
        mysqli_close($conn);
        exit;
    }
    
    getNumLikes();
?>