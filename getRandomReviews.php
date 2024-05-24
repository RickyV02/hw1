<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function getRandomReview() {
        
        global $userid;

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_GET["q"]);
        if(is_numeric($id)){
            $query = "SELECT * FROM GAME_REVIEWS WHERE GAME_ID = '$id'";
        }else{
            $query = "SELECT * FROM MOVIE_REVIEWS WHERE FILM_ID = '$id'";
        }
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $response=array();
        if(mysqli_num_rows($res) > 0) {
            while($row=mysqli_fetch_assoc($res)) {
                $response[] = $row; 
            }
            echo json_encode($response);
        }else{
            echo json_encode(array('norev' => true));
        }
        mysqli_close($conn);
        exit;
    }
    
    getRandomReview();
?>