<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function addReviewLike() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $referenceid= mysqli_real_escape_string($conn, $_POST["reference_id"]);
        if(is_numeric($referenceid)){
            $query = "INSERT INTO GAMEREVIEW_LIKES (REVIEW_ID, USERNAME) VALUES ($id,'$userid')";
            if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                $query = "UPDATE GAME_REVIEWS SET NUMLIKE = NUMLIKE + 1 WHERE ID = '$id'";
                if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                    echo json_encode(array('ok' => "insert","id"=> $id));
                    exit;
                }
            }
        }else{
            $query = "INSERT INTO MOVIEREVIEW_LIKES (REVIEW_ID, USERNAME) VALUES ($id,'$userid')";
            if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                $query = "UPDATE MOVIE_REVIEWS SET NUMLIKE = NUMLIKE + 1 WHERE ID = '$id'";
                if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                    echo json_encode(array('ok' => "insert","id"=> $id));
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