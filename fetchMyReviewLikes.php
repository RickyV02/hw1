<?php
    include "checkSession.php";
    if (!$userid = checkSession()){
        header("Location: index.php");
        exit;
    }
    function getLike() {
        
        global $userid;

        $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
        
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if(is_numeric($id)){
            $query = "SELECT * FROM GAMEREVIEW_LIKES WHERE USERNAME = '$userid' AND REVIEW_ID = '$id'";
        }else{
            $query = "SELECT * FROM MOVIEREVIEW_LIKES WHERE USERNAME = '$userid' AND REVIEW_ID = '$id'";
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