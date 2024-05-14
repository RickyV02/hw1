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
    <script src="login.js" defer></script>
    <title>Letterboxd-Login</title>
</head>

<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        header("Location: home.php");
        exit;
    }
    if(isset($_POST["Username"]) && isset($_POST["password"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ". mysqli_connect_error());
		$username = mysqli_real_escape_string($conn,$_POST['Username']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);

		$query = "SELECT * FROM ACCOUNTS WHERE USERNAME ='" . $username . "' AND PWD = '" .$password."'";
        $res = mysqli_query($conn, $query)  or die("Errore: ". mysqli_connect_error());
       if(mysqli_num_rows($res) > 0)
        {
            $_SESSION["username"] = $_POST["Username"];
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
        <h2>Sign In</h2>
        <p>Keep in touch with your friends</p>
        <?php
            if(isset($error))
            {
                echo "<p class='errormsg'>";
                echo "Credenziali non valide";
                echo "</p>";
            }
        ?>
        <p id="nopwd" class="nascosto">Inserire password!</p>
        <input type="text" placeholder="Username" name="Username" required>
        <input type="password" placeholder="Password" name="password" class="pwd">
        <span id="show-password">Mostra password</span>
        <input type="submit" value="SIGN IN" class="button">
        <p>Not Registred yet? <a href="create_account.php"> Sign up now!</a></p>
        <p>Forgot Password? <a href="cambio_password.php">Change it Now!</a></p>
        <a href="index.php">Home Page</a>
    </form>

</body>

</html>