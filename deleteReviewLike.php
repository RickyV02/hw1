<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function deleteReviewLike() {
        
        global $userid;

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $referenceid= mysqli_real_escape_string($conn, $_POST["reference_id"]);
        if(is_numeric($referenceid)){
            $query = "DELETE FROM GAMEREVIEW_LIKES  WHERE REVIEW_ID = '$id' AND USERNAME = '$userid'";
            if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                $query = "UPDATE GAME_REVIEWS SET NUMLIKE = NUMLIKE - 1 WHERE ID = '$id'";
                if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                    echo json_encode(array('ok' => "delete","id"=> $id));
                    exit;
                }
            }
        }else{
            $query = "DELETE FROM MOVIEREVIEW_LIKES  WHERE REVIEW_ID = '$id' AND USERNAME = '$userid'";
            if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                $query = "UPDATE MOVIE_REVIEWS SET NUMLIKE = NUMLIKE - 1 WHERE ID = '$id'";
                if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                    echo json_encode(array('ok' => "delete","id"=> $id));
                    exit;
                }
            }
        }
        
        mysqli_close($conn);
        echo json_encode(array('ok' => false));
        exit;
    }
    
    deleteReviewLike();
?>