<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function addReviewLike() {
        
        global $userid;

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "INSERT INTO GAMEREVIEW_LIKES (REVIEW_ID, USERNAME) VALUES ($id,'$userid')";
            if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                $query = "UPDATE GAME_REVIEWS SET NUMLIKE = NUMLIKE + 1 WHERE USERNAME = '$userid' AND GAME_ID = '$id'";
                if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                    echo json_encode(array('ok' => true));
                    exit;
                }
            }
        }else{
            $query = "INSERT INTO MOVIEREVIEW_LIKES (REVIEW_ID, USERNAME) VALUES ($id,'$userid')";
            if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                $query = "UPDATE MOVIE_REVIEWS SET NUMLIKE = NUMLIKE + 1 WHERE USERNAME = '$userid' AND FILM_ID = '$id'";
                if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                    echo json_encode(array('ok' => true));
                    exit;
                }
            }
        }
        
        mysqli_close($conn);
        echo json_encode(array('ok' => false));
        exit;
    }
    
    addReviewLike();
?>