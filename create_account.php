<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cutive&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <script src="create_account.js" defer></script>
    <title>Letterboxd•Create Account</title>
</head>

<?php

include "checkUser.php";
if(checkSession()){
    header("Location: home.php");
    exit;
}

if(isset($_POST['email'])&&isset($_POST['Username']) && isset($_POST['password'])&& isset($_POST['terms']))
{
    $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $username = mysqli_real_escape_string($conn,$_POST['Username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $query = "SELECT * FROM ACCOUNTS WHERE USERNAME = '$username' OR EMAIL = '$email'";
    $res = mysqli_query($conn, $query)  or die("Errore: ". mysqli_connect_error());
   if(mysqli_num_rows($res) > 0)
    {
        $error = true;
    }
    else
    {           
        $query="INSERT INTO ACCOUNTS(EMAIL,USERNAME,PWD) VALUES('$email','$username','$password')";
        $res = mysqli_query($conn, $query)  or die("Errore: ". mysqli_connect_error());
        if($res){
            $_SESSION["username"]=$username;
            header("Location: home.php");
            exit;
        }else{
            $error = true;
        }
    }
}
?>

<body>
    <form name="login" method="post" class="login-box">
        <h2>Sign Up</h2>
        <p>Keep in touch with your friends</p>
        <?php
            if(isset($error))
            {
                echo "<p class='errormsg'>";
                echo "Credenziali non valide (prova a cambiare email e/o username)";
                echo "</p>";
            }
        ?>
        <input type="email" placeholder="Email" name="email" required>
        <p id="em" class="nascosto">Email non valida!</p>
        <input type="text" placeholder="Username" name="Username" required>
        <div class="password-container">
            <input type="password" placeholder="Password" name="password" class="pwd">
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
            <p id="nopwd" class="nascosto">Inserire password!</p>
            <p id="pwd" class="nascosto">La password deve contenere almeno una lettera maiuscola e un carattere
                speciale!
            </p>
        </div>
        <div class="password-container">
            <input type="password" placeholder="Repeat Password" name="rpassword" class="pwd" autocomplete="off">
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
            <p id="pwdmatch" class="nascosto">La password non coincidono!</p>
        </div>
        <div>
            <input type="checkbox" name="terms" required>
            <label for="terms">I agree to the terms and conditions of Letterboxd</a></label>
            <p id="noterms" class="nascosto">Accettare i termini e condizioni d'uso!</p>
        </div>
        <input type="submit" value="SIGN UP" class="button">
        <p>Already Have an Account? <a href="login.php">Sign in now!</a></p>
        <a href="index.php">Home Page</a>
    </form>

</body>

</html>