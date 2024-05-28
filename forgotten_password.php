<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <script src="forgotten_password.js" defer></script>
    <title>FlixNexus • Forgotten Password</title>
</head>

<?php
include "checkSession.php";
include "RandomPassword.php";

if ($userid = checkSession() || isset($_COOKIE["remember_me"])) {
    header("Location: home.php");
    exit;
}

if(isset($_POST["email"])) {

    $errors=array();
    global $dbconfig;
    global $userid;
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $to = mysqli_real_escape_string($conn,$_POST['email']);
    
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email format not valid!";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($to));
        $res = mysqli_query($conn, "SELECT * FROM ACCOUNTS WHERE EMAIL = '$email'")or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {
        $new_password = generateRandomString(8);
        $password = password_hash($new_password, PASSWORD_BCRYPT);
        $query = "UPDATE ACCOUNTS SET PWD = '$new_password' WHERE USERNAME = '$userid'";
        if (mysqli_query($conn, $query) or die(mysqli_error($conn))){
            $subject = "Reset Password";
            $message = "Your new passowrd is: " . $new_password . "\n Go to your profile to change it as soon as possible!";
            $headers = "From: FlixNexusMail@gmail.com";
            mail($to, $subject, $message, $headers);
            $errors[] = "Email with new password sent successfully!";
        }else{
            $errors[] = "Database connection error!";
        }
        }else{
            $errors[] = "Email not registered!";
        }
    }
}
?>

<body>
    <form name="login" method="post" class="login-box">
        <h2>Forgotten Password Form</h2>
        <?php 
        if(isset($errors)) 
        {
            foreach($errors as $err) {
                {
                    echo "<p class='errormsg'>";
                    echo $err;
                    echo "</p>";
                }
            }
        } 
        ?>
        <input type="email" placeholder="Email" name="email" autocomplete="off" required
            <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
        <p id="em" class="nascosto">Email format not valid!</p>
        <p id="em2" class="nascosto">Email not Registred!</p>
        <input type="submit" value="SEND EMAIL" class="button">
        <a href="index.php">Home Page</a>
    </form>
</body>

</html>