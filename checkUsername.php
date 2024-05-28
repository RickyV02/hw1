<?php 
    include("checkSession.php");
    if (!isset($_GET["Username"])) {
        header("Location: index.php");
        exit;
    }
    global $dbconfig;    
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $username = mysqli_real_escape_string($conn, $_GET["Username"]);

    $query = "SELECT USERNAME FROM ACCOUNTS WHERE USERNAME = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>