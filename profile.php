<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <title>FlixNexus•User Profile</title>
    <script src="profile.js" defer></script>
    <link rel="stylesheet" href="profile.css">
</head>

<?php
    include "checkSession.php";
    if(!$userid=checkSession()){
        header("Location: login.php");
        exit;
    }
?>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <img id="main-avatar">
            <h1 data-username="<?php echo $_GET["q"]?>" id="main-username"></h1>
        </div>
        <div class="user-info">
            <?php
            if($userid==$_GET["q"])
            {
                echo "<p id='settings'>";
                echo "Settings";
                echo "</p>";
            }
            ?>
            <p id="favourites">
            </p>
            <p id="written"></p>
        </div>
    </div>
    <?php
            if($userid==$_GET["q"])
            {
                echo "<div id='updateResponse'>";
                echo "</div>";
            }
            ?>
    <div id="profile-content" class="profile-content">
        <h1 id="movie-header" class="section-header"></h1>
        <section id="favourite-movies"></section>
        <h1 id="game-header" class="section-header"></h1>
        <section id="favourite-games"></section>
        <h1 id="my-header" class="section-header"></h1>
        <section id="your-reviews"></section>
        <h1 id="favourite-header" class="section-header"></h1>
        <section id="favourite-reviews"></section>
    </div>
    <?php if ($userid == $_GET["q"]): ?>
    <div id="settings-div" class="nascosto">
        <form method="post" class="nascosto" autocomplete="off" enctype="multipart/form-data">
            <h1 class="section-header">PROFILE SETTINGS</h1>
            <input type="email" placeholder="New Email" autocomplete="off" name="email">
            <p id="em" class="nascosto">Email format not valid!</p>
            <p id="em2" class="nascosto">Email already taken!</p>
            <div class="password-container">
                <input type="password" id="pwd_input" placeholder="New Password" autocomplete="off" name="password">
                <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
            </div>
            <p id="minlength" class="nascosto">Enter a password with at least 8 characters!</p>
            <p id="pwd" class="nascosto">Password must contain at least one Upper Case letter and a special character!
            </p>
            <label id="avatar" for="avatar">Upload New Profile Picture</label>
            <input id="file" type="file" accept=".jpg, .jpeg, image/gif, image/png" name="avatar">
            <p id="nosize" class="nascosto">The image must not exceed 5MB!</p>
            <p id="noext" class="nascosto">Allowed formats are .png, .jpeg, .jpg, and .gif!</p>
            <input type="submit" value="SUBMIT" class="submit">
        </form>
    </div>
    <?php endif; ?>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>FlixNexus • Social Discovery</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="terms.html">Terms of Use</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: FlixNexus@gmail.com</p>
                <p>Phone: (555) 123-4567</p>
            </div>
        </div>
    </footer>
</body>

</html>