<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <script src="login.js" defer></script>
    <title>FlixNexus • Login</title>
</head>

<?php
include "checkSession.php";

if (checkSession() || isset($_COOKIE["remember_me"])) {
    header("Location: home.php");
    exit;
}

if (isset($_POST["Username"], $_POST["password"])) {
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: " . mysqli_connect_error());

    $username = mysqli_real_escape_string($conn, $_POST["Username"]);
    $query = "SELECT * FROM ACCOUNTS WHERE USERNAME = '$username'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if (password_verify($_POST["password"], $row["PWD"])) {
                $_SESSION["username"] = $row["USERNAME"];
                if (isset($_POST["rememberme"])) {
                    $token = bin2hex(random_bytes(32));
                    $expires_at = time() + (86400 * 30);
                    $expires_at_datetime = date('Y-m-d H:i:s', $expires_at);
                    $id = $row["ID"];
                    $query = "INSERT INTO USER_TOKENS (USERID, TOKEN, EXPIRES_AT) VALUES ('$id', '$token', '$expires_at_datetime')";
                    $res = mysqli_query($conn, $query);
                    if ($res) {
                        setcookie("remember_me", $token, $expires_at);
                    } else {
                        $error = "Errore durante la creazione del token di ricordo!";
                    }
                }
                header("Location: home.php");
                exit;
            } else {
                $error = "Password errata!";
            }
        } else {
            $error = "Credenziali errate!";
        }
        mysqli_free_result($res);
    } else {
        $error = "Errore durante l'esecuzione della query!";
    }
    mysqli_close($conn);
} elseif (isset($_POST["Username"]) || isset($_POST["password"])) {
    $error = "Inserisci username e password!";
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
                echo $error;
                echo "</p>";
            }
        ?>
        <input type="text" placeholder="Username" name="Username" autocomplete="off" required
            <?php if(isset($_POST["Username"])){echo "value=".$_POST["Username"];} ?>>
        <p id="nouser" class="nascosto">Inserire username!</p>
        <div class="password-container">
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="pwd"
                <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
        </div>
        <p id="nopwd" class="nascosto">Inserire password!</p>
        <div class="check">
            <input type="checkbox" name="rememberme" id="rememberme"
                <?php if(isset($_POST["rememberme"])){echo $_POST["rememberme"] ? "checked" : "";} ?>>
            <label for="rememberme">Remember me</label>
        </div>
        <input type="submit" value="SIGN IN" class="button">
        <p>Not Registred yet? <a href="create_account.php">Sign up now!</a></p>
        <a href="index.php">Home Page</a>
    </form>

</body>

</html>