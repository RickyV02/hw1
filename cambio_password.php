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
    <script src="cambio_pwd.js" defer></script>
    <title>Letterboxd-Login</title>
</head>

<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        header("Location: home.php");
        exit;
    }
    if(isset($_POST["Username"]) && isset($_POST["Oldpassword"])&& isset($_POST["Newpassword"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ". mysqli_connect_error());
		$username = mysqli_real_escape_string($conn,$_POST['Username']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
        $Newpassword = mysqli_real_escape_string($conn,$_POST['Newpassword']);

		$query = "SELECT * FROM ACCOUNTS WHERE EMAIL ='" . $email . "' AND USERNAME = '" .$username."'";
        $res = mysqli_query($conn, $query)  or die("Errore: ". mysqli_connect_error());
       if(mysqli_num_rows($res) > 0)
        {
            $query = "UPDATE ACCOUNTS SET PWD ='" . $Newpassword . "' WHERE USERNAME ='" . $username . "' AND PWD = '" .$Oldpassword."'";
            $res = mysqli_query($conn, $query)  or die("Errore: ". mysqli_connect_error());
            $_SESSION["username"] = $username;
            header("Location: home.php");
            exit;
        }
        else
        {           
            $error = true;
        }
    }
?>

<body>
    <form name="login" method="post" class="login-box">
        <h2>Change Password</h2>
        <?php
            if(isset($error))
            {
                echo "<p class='errormsg'>";
                echo "Credenziali non valide";
                echo "</p>";
            }
        ?>
        <input type="text" placeholder="Username" name="Username" autocomplete="off" required
            <?php if(isset($_POST["Username"])){echo "value=".$_POST["Username"];} ?>>
        <input type="email" placeholder="Email" name="email" autocomplete="off" required
            <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
        <div class="password-container">
            <input type="password" placeholder="New Password" name="password" class="pwd" autocomplete="off"
                <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
        </div>
        <p id="samepwd" class="nascosto">La nuova password non può essere uguale alla precedente!</p>
        <p id="nopwd" class="nascosto">Inserire password!</p>
        <p id="pwd" class="nascosto">La password deve contenere almeno una lettera maiuscola e un carattere
            speciale!
        </p>
        <div class="password-container">
            <input type="password" placeholder="Repeat Password" name="rpassword" class="pwd" autocomplete="off"
                <?php if(isset($_POST["rpassword"])){echo "value=".$_POST["rpassword"];} ?>>
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
        </div>
        <p id="pwdmatch" class="nascosto">La password non coincidono!</p>
        <input type="submit" value="SIGN IN" class="button">
        <p>Already Have an Account? <a href="login.php"> Sign in now!</a></p>
        <a href="index.php">Home Page</a>
    </form>

</body>

</html>