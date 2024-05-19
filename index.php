<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <script src="index.js" defer></script>
    <title>FlixNexus • Social Index</title>
</head>

<?php
    include "checkSession.php";
    if(checkSession()){
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
            Track films you’ve watched. <br />
            Search games you recently played. <br />
            Share them with your friends.
        </h1>
        <a class="crea-account" id="spam" href="create_account.php">GET STARTED — IT‘S FREE!</a>
        <section id="feature">
            <h1>LETTERBOXD LETS YOU...</h1>
            <div class="feature__box">
                <div class="verde">
                    <img src="public/icona1.png" />
                    <p class="panel">
                        Keep track of every film you've ever watched and games you've played
                    </p>
                </div>
                <div class="arancione">
                    <img src="public/icona2.png" />
                    <p class="panel">
                        Show some love for your favorite films and games with a
                        "like"
                    </p>
                </div>
                <div class="azzurro">
                    <img src="public/icona6.png" />
                    <p class="panel">
                        Write and share comments, and follow friends and other members to
                        read theirs
                    </p>
                </div>
                <div class="verde">
                    <img src="public/icona3.png" />
                    <p class="panel">
                        Rate each film to record and
                        share your reaction
                    </p>
                </div>
                <div class="arancione">
                    <img src="public/icona5.png" />
                    <p class="panel">
                        Keep a diary of your film watching and game status
                    </p>
                </div>
                <div class="azzurro">
                    <img src="public/icona4.png" />
                    <p class="panel">
                        Compile and share lists of films on any topic and keep a watchlist
                        of films to see
                    </p>
                </div>
            </div>
        </section>
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
        <h1>
            Write and share reviews. Search the games you like. Share your life in
            film.
        </h1>
        <p class="word">
            Below are some popular reviews and games from this week.
            <a href="create_account.php">Sign up</a> to create your own.
        </p>
        <div class="reviews">
            <div class="colonna">
                <h1>POPULAR REVIEWS THIS WEEK</h1>
                <section class="recensioni">
                    <div class="recensioni__box">
                        <a class="locandina" href=""><img src="public/locandina1.jpg" /></a>
                        <div class="film-content">
                            <h2 class="film-titolo">
                                <a class="film-nome" href="">Dune: Part Two</a><a class="anno" href="">2024</a>
                            </h2>
                            <div class="utente">
                                <a class="avatar" href=""><img src="public/avatar1.jpg" /></a>
                                <p class="nickname">
                                    <a href="">Bryan Espitia</a>
                                    <span> ★★★★½ </span>
                                </p>
                            </div>
                            <p class="frase">
                                Need a friend like Stilgar to hype me up all the time
                            </p>
                            <p class="like">
                                <a href=""><img src="public/icona2.png" /><span>17,316 likes</span></a>
                            </p>
                        </div>
                    </div>
                    <div class="recensioni__box">
                        <a class="locandina" href=""><img src="public/locandina2.jpg" /></a>
                        <div class="film-content">
                            <h2 class="film-titolo">
                                <a class="film-nome" href="">Damsel</a><a class="anno" href="">2024</a>
                            </h2>
                            <div class="utente">
                                <a class="avatar" href=""><img src="public/avatar2.jpg" /></a>
                                <p class="nickname">
                                    <a href="">esau</a>
                                    <span> ★★★ </span>
                                </p>
                            </div>
                            <p class="frase">
                                i wonder if kate middleton is going through the same thing.
                            </p>
                            <p class="like">
                                <a href=""><img src="public/icona2.png" /><span>3,604 likes</span></a>
                            </p>
                        </div>
                    </div>
                    <div class="recensioni__box">
                        <a class="locandina" href=""><img src="public/locandina3.jpg" /></a>
                        <div class="film-content">
                            <h2 class="film-titolo">
                                <a class="film-nome" href="">Dune: Part Two</a><a class="anno" href="">2024</a>
                            </h2>
                            <div class="utente">
                                <a class="avatar" href=""><img src="public/avatar3.jpg" /></a>
                                <p class="nickname">
                                    <a href="">ConnorEatsPants</a>
                                    <span> ★★★★★ </span>
                                </p>
                            </div>
                            <p class="frase">i have seen the light of Islam</p>
                            <p class="like">
                                <a href=""><img src="public/icona2.png" /><span>15,264 likes</span></a>
                            </p>
                        </div>
                    </div>
                    <div class="recensioni__box">
                        <a class="locandina" href=""><img src="public/locandina4.jpg" /></a>
                        <div class="film-content">
                            <h2 class="film-titolo">
                                <a class="film-nome" href="">Love Lies Bleeding</a><a class="anno" href="">2024</a>
                            </h2>
                            <div class="utente">
                                <a class="avatar" href=""><img src="public/avatar4.jpg" /></a>
                                <p class="nickname">
                                    <a href="">24frameosnick</a>
                                    <span> ★★★★ </span>
                                </p>
                            </div>
                            <p class="frase">
                                Like one of those cool ass posters you’d see on the wall in a
                                characters room in another movie come to life as its own movie
                                and it’s fucking SICK
                            </p>
                            <p class="like">
                                <a href=""><img src="public/icona2.png" />
                                    2,460 likes</a>
                            </p>
                        </div>
                    </div>
                    <div class="recensioni__box">
                        <a class="locandina" href=""><img src="public/locandina4.jpg" /></a>
                        <div class="film-content">
                            <h2 class="film-titolo">
                                <a class="film-nome" href="">Love Lies Bleeding</a><a class="anno" href="">2024</a>
                            </h2>
                            <div class="utente">
                                <a class="avatar" href=""><img src="public/avatar5.jpg" /></a>
                                <p class="nickname">
                                    <a href="">#1 gizmo fan</a>
                                    <span> ★★★★ </span>
                                </p>
                            </div>
                            <p class="frase">
                                some of y’all are gonna HATE this… and some of y’all are gonna
                                be on the right side of history
                            </p>
                            <p class="like">
                                <a href=""><img src="public/icona2.png" />2,037 likes</a>
                            </p>
                        </div>
                    </div>
                    <div class="recensioni__box">
                        <a class="locandina" href=""><img src="public/locandina5.jpg" /></a>
                        <div class="film-content">
                            <h2 class="film-titolo">
                                <a class="film-nome" href="">Jimmy Neutron: Boy Genius</a><a class="anno"
                                    href="">2001</a>
                            </h2>
                            <div class="utente">
                                <a class="avatar" href=""><img src="public/avatar6.jpg" /></a>
                                <p class="nickname">
                                    <a href="">James (Schaffrillas)</a>
                                    <span> ★★★ </span>
                                </p>
                            </div>
                            <p class="frase">
                                It is extremely funny that this is an Academy Award nominated
                                film
                            </p>
                            <p class="like">
                                <a href=""><img src="public/icona2.png" />2,828 likes</a>
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section class="games">
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
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: FlixNexus@gmail.com</p>
                <p>Phone: 3420710390</p>
            </div>
        </div>
    </footer>
</body>

</html>