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
    if(!checkSession()){
        header("Location: login.php");
        exit;
    }   
?>
<script>
const username = "<?php echo $_GET["q"]?>";
</script>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <img id="main-avatar">
            <h1 id="main-username"></h1>
        </div>
    </div>
    <div id="profile-content">
        <h1 id="movie-header" class="section-header"></h1>
        <section id="favourite-movies"></section>
        <h1 id="game-header" class="section-header"></h1>
        <section id="favourite-games"></section>
        <h1 id="my-header" class="section-header"></h1>
        <section id="your-reviews"></section>
        <h1 id="favourite-header" class="section-header"></h1>
        <section id="favourite-reviews"></section>
    </div>
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