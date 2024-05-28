<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function getReviewLikes() {
        
        global $userid;
        global $dbconfig;
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "SELECT REVIEW_ID FROM GAMEREVIEW_LIKES WHERE USERNAME = '$userid'";
        }else{
            $query = "SELECT REVIEW_ID FROM MOVIEREVIEW_LIKES WHERE USERNAME = '$userid'";
        }
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) > 0) {
            $response=array();
            while($row = mysqli_fetch_assoc($res)) {
                $response[]=$row;
            }
            echo json_encode($response);
        }else{
            echo json_encode(array('nolike' => true));
        }
        mysqli_close($conn);
        exit;
    }

    getReviewLikes();
?>