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
if ($userid = checkSession() || isset($_COOKIE["remember_me"])) {
    header("Location: home.php");
    exit;
}
?>

<body>
    <form name="login" method="post" class="login-box">
        <h2>Forgotten Password</h2>
        <p id="status"></p>
        <input type="email" placeholder="Email" name="email" autocomplete="off" required
            <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
        <p id="em" class="nascosto">Email format not valid!</p>
        <p id="em2" class="nascosto">Email not Registred!</p>
        <input type="submit" value="SEND EMAIL" class="button">
        <a href="index.php">Home Page</a>
    </form>
</body>

</html>