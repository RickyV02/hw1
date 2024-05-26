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
            $query = "SELECT GAME_REVIEWS.*,ACCOUNTS.USERNAME,AVATAR FROM GAME_REVIEWS  JOIN ACCOUNTS ON GAME_REVIEWS.USERNAME=ACCOUNTS.USERNAME WHERE GAME_ID = '$id' ORDER BY RAND()";
        }else{
            $query = "SELECT MOVIE_REVIEWS.*,ACCOUNTS.USERNAME,AVATAR FROM MOVIE_REVIEWS JOIN ACCOUNTS ON MOVIE_REVIEWS.USERNAME=ACCOUNTS.USERNAME WHERE FILM_ID = '$id' ORDER BY RAND()";
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