<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function saveLike() {
        
        global $userid;

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $cover = mysqli_real_escape_string($conn, $_POST["cover"]);
        if(is_numeric($id)){
            $query = "INSERT INTO GAME_LIKES (USERNAME, GAME_ID, GAME_NAME, COVER) VALUES('$userid','$id','$name','$cover')";
        }else{
            $query = "INSERT INTO MOVIE_LIKES (USERNAME, FILM_ID, FILM_NAME, COVER) VALUES('$userid','$id','$name','$cover')";
        }
        
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
        }else{
            echo json_encode(array('ok' => false));
        }
        mysqli_close($conn);
        exit;
    }

    saveLike();
?>