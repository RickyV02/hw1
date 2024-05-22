<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <script src="home.js" defer></script>
    <title>FlixNexus • Home</title>
</head>

<?php
    include "checkSession.php";
    if(!checkSession()){
        header("Location: index.php");
        exit;
    } 
?>

<body>
    <div class="container">
        <div class="overlay">
        </div>
        <div class="sfondo">
        </div>
    </div>
    <header>
        <section class="navsection">
            <h1 class="logo">
                <img src="public/logo.png">
                <p>FlixNexus</p>
            </h1>
            <nav>
                <a href="logout.php"><span>LOGOUT</span></a>
                <a href="profile.php"><span>PROFILE</span></a>
                <form method="post" action="search.php">
                    <input type="text" autocomplete="off" id="movie_name" name="search">
                    <input type="submit" class="submit" value="">
                </form>
            </nav>
        </section>
    </header>
    <div class="wrapper">
        <h1 class="slogan">
            Search films you’ve watched.
        </h1>
        <h1 class="slogan">
            Track games you recently played.
        </h1>
        <h1 class="slogan">
            Get infos about them.
        </h1>
        <p id="spam">Welcome <?php echo $_SESSION["username"]; ?> !</p>
        <h1>
            Start looking for...
        </h1>
        <section class="livefeed" id="livefeed">
            <h1>10 WEEKLY RECOMMENDATION</h1>
            <div>
            </div>
        </section>
        <section class="livefeed" id="randommovies">
            <h1>10 RANDOM MOVIES TO WATCH</h1>
            <div>
            </div>
        </section>
        <section class="livefeed" id="randomseries">
            <h1>10 RANDOM SERIES TO WATCH</h1>
            <div>
            </div>
        </section>
        <section class="livefeed" id="randomgames">
            <h1>DONT KNOW WHAT TO PLAY? TRY THESE!</h1>
            <div>
            </div>
        </section>
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