<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <script src="index.js" defer></script>
    <title>FlixNexus • Index</title>
</head>

<?php
    include "checkSession.php";
    if(checkSession() || isset($_COOKIE["remember_me"])){
        header("Location: home.php");
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
                <a href="login.php"><span>LOGIN</span></a>
                <a href="create_account.php"><span>SIGN UP</span></a>
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
        <a id="spam" href="create_account.php">GET STARTED — IT‘S FREE!</a>
        <section id="feature">
            <h1>LETTERBOXD LETS YOU...</h1>
            <div class="feature__box">
                <div class="verde">
                    <p class="panel">
                        Keep track of every film you've ever watched and games you've played
                    </p>
                </div>
                <div class="arancione">
                    <p class="panel">
                        Show some love for your favorite films and games with a
                        "like"
                    </p>
                </div>
                <div class="azzurro">
                    <p class="panel">
                        Write and share comments, and follow friends and other members to
                        read theirs
                    </p>
                </div>
                <div class="verde">
                    <p class="panel">
                        Rate each film to record and
                        share your reaction
                    </p>
                </div>
                <div class="arancione">
                    <p class="panel">
                        Keep a diary of your film watching and game status
                    </p>
                </div>
                <div class="azzurro">
                    <p class="panel">
                        Compile and share lists of films on any topic and keep a watchlist
                        of films to see
                    </p>
                </div>
            </div>
        </section>
        <h1>
            Search the games you like. Share your life in
            film. Put like and comments.
        </h1>
        <p class="signus">
            Join us to write and read comments.
            <a href="create_account.php">Sign up</a> to create your own.
        </p>
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