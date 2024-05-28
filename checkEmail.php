<?php
    include("checkSession.php");
    if (!isset($_GET["email"])) {
        header("Location: index.php");
        exit;
    }
    global $dbconfig;    
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    
    $email = mysqli_real_escape_string($conn, $_GET["email"]);

    $query = "SELECT EMAIL FROM ACCOUNTS WHERE EMAIL = '$email'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>