<?php
include "checkSession.php";
include "RandomPassword.php";
function sendMail(){
    $status=array();
    global $dbconfig;
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status[] = "Email format not valid!";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($email));
        $res = mysqli_query($conn, "SELECT * FROM ACCOUNTS WHERE EMAIL = '$email'")or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {
        $new_password = generateRandomString(8);
        $password = password_hash($new_password, PASSWORD_BCRYPT);
        $query = "UPDATE ACCOUNTS SET PWD = '$password' WHERE EMAIL = '$email'";
        if (mysqli_query($conn, $query) or die(mysqli_error($conn))){
            $subject = "Reset Password";
            $message = "Your new password is: " . $new_password . "\nGo to your profile to change it as soon as possible!";
            $headers = "From: FlixNexusMail@gmail.com";
            if(mail($email, $subject, $message, $headers)){
                $status[] = "Email sent successfully!";
            }else{
                $status[] = "Error sending email!";
            }
        }else{
            $status[] = "Database connection error!";
        }
        }else{
            $status[] = "Email not registered!";
        }
    }
    echo json_encode(array("status"=> $status));
    mysqli_close($conn);
    exit;    
}

    sendMail();
?>