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

if(isset($_POST['email'])&&isset($_POST['Username']) && isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['terms']))
{
    $errors=array();
    $conn = mysqli_connect("localhost", "root", "", "HW1") or die("Errore: ". mysqli_connect_error());
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['Username'])) {
        $errors[] = "Formato username non valido!";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['Username']);
        $query = "SELECT USERNAME FROM ACCOUNTS WHERE USERNAME = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $errors[] = "Username già utilizzato!";
        }
    }

    if (strlen($password) < 8) {
        $errors[] = "Inserire una password di almeno 8 caratteri!";
    } 

    if (strcmp($password, $_POST["rpassword"]) != 0) {
        $errors[] = "Le password non coincidono!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email non valida!";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($email));
        $res = mysqli_query($conn, "SELECT EMAIL FROM ACCOUNTS WHERE EMAIL = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $errors[] = "Email già utilizzata!";
        }
    }

    if (count($errors) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO ACCOUNTS(EMAIL,USERNAME,PWD) VALUES('$email','$username','$password')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION["username"] = $username;
            mysqli_close($conn);
            header("Location: home.php");
            exit;
        } else {
            $errors[] = "Errore di connessione al Database";
        }
    }

    mysqli_close($conn);
    
}else if (isset($_POST["Username"])){
    $errors[] = "Riempire tutti i campi!";
}
?>

<body>
    <form name="login" method="post" class="login-box">
        <h2>Sign Up</h2>
        <p>Keep in touch with your friends</p>
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
        <p id="em" class="nascosto">Email non valida!</p>
        <p id="em2" class="nascosto">Email già utilizzata!</p>
        <input type="text" placeholder="Username" name="Username" autocomplete="off" required
            <?php if(isset($_POST["Username"])){echo "value=".$_POST["Username"];} ?>>
        <p id="user" class="nascosto">Username non disponibile!</p>
        <div class="password-container">
            <input type="password" placeholder="Password" name="password" class="pwd" autocomplete="off"
                <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
        </div>
        <p id="minlength" class="nascosto">Inserire una password di almeno 6 caratteri!</p>
        <p id="pwd" class="nascosto">La passsword deve contenere almeno una lettera maiuscola e un carattere
            speciale!
        </p>
        <div class="password-container">
            <input type="password" placeholder="Repeat Password" name="rpassword" class="pwd" autocomplete="off"
                <?php if(isset($_POST["rpassword"])){echo "value=".$_POST["rpassword"];} ?>>
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
        </div>
        <p id="pwdmatch" class="nascosto">La password non coincidono!</p>
        <div>
            <input type="checkbox" name="terms" id="terms"
                <?php if(isset($_POST["terms"])){echo $_POST["terms"] ? "checked" : "";} ?>>
            <label for="terms">I agree to the terms and conditions of Letterboxd</label>
        </div>
        <p id="noterms" class="nascosto">Accettare i termini e condizioni d'uso!</p>
        <input type="submit" value="SIGN UP" class="button">
        <p>Already Have an Account? <a href="login.php">Sign in now!</a></p>
        <a href="index.php">Home Page</a>
    </form>

</body>

</html>