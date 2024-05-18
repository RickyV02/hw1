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
                        Keep track of every film you've ever watched (or just start from
                        the day you join)
                    </p>
                </div>
                <div class="arancione">
                    <img src="public/icona2.png" />
                    <p class="panel">
                        Show some love for yout favorite films, lists and reviews with a
                        "like"
                    </p>
                </div>
                <div class="azzurro">
                    <img src="public/icona6.png" />
                    <p class="panel">
                        Write and share reviews, and follow friends and other members to
                        read theirs
                    </p>
                </div>
                <div class="verde">
                    <img src="public/icona3.png" />
                    <p class="panel">
                        Rate each film on a five-star scale (with halves) to record and
                        share your reaction
                    </p>
                </div>
                <div class="arancione">
                    <img src="public/icona5.png" />
                    <p class="panel">
                        Keep a diary of your film watching (and upgrade to
                        <span>Pro</span> for comprehensive stats)
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
        <section class="recentarticles">
            <h1>RECENT ARTICLES</h1>
            <div class="rs__body">
                <section class="articolo">
                    <div>
                        <a href=""><img class="immagine-articolo" src="public/immagine1.jpg" /></a>
                    </div>
                    <div class="contenuto-articolo">
                        <div class="header-articolo">
                            <a class="readmore" href=""><img src="public/av1.jpg" /></a>
                            <a class="readmore" href="">The Extra Credits</a>
                        </div>
                        <div class="artbody">
                            <p class="maintxt">
                                The 50 Best Movies of 2023
                            </p>
                            <p class="ndtxt">Here are our favorite movies of 2023 ranked</p>
                            <section class="readstory">
                                <a class="readmore" href="">READ STORY</a>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="articolo">
                    <div>
                        <a href=""><img class="immagine-articolo" src="public/immagine2.jpg" /></a>
                    </div>
                    <div class="contenutoarctiolo">
                        <div class="header-articolo">
                            <a class="readmore" href=""><img src="public/av2.jpg" /></a>
                            <a class="readmore" href="">TheCinemapholis</a>
                        </div>
                        <div class="artbody">
                            <p class="maintxt">
                                Top 10 Best Horror Movies on Peacock
                            </p>
                            <p class="ndtxt">
                                The original programming by Peacock is far from impressive,
                                one cannot deny that horror movies, both classic and
                                contemporary, are worth getting that subscription. In the
                                following list, we will take a look at some of the top horror
                                movies you can stream on Peacock
                            </p>
                            <section class="readstory">
                                <a class="readmore" href="">READ STORY</a>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="articolo">
                    <div>
                        <a href=""><img class="immagine-articolo" src="public/immagine3.jpg" /></a>
                    </div>
                    <div class="contenutoarctiolo">
                        <div class="header-articolo">
                            <a class="readmore" href=""><img src="public/av3.jpg" /></a>
                            <a class="readmore" href="">TheFilmArchiver</a>
                        </div>
                        <div class="artbody">
                            <p class="maintxt">
                                2001: A Space Odyssey | The Definitive Explanation
                            </p>
                            <p class="ndtxt">
                                2001: A Space Odyssey isn’t as complicated as it seems. The
                                film is about humanity’s relationship with technology and the
                                next stage of our evolution. It came out in the midst of both
                                the Atomic Age and the Space Race. A time when people were
                                fascinated by and terrified of where science would lead us.
                                For every advancement that made daily life easier there was
                                another thing that could annihilate us all.
                            </p>
                            <section class="readstory">
                                <a class="readmore" href="">READ STORY</a>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="articolo">
                    <div>
                        <a href=""><img class="immagine-articolo" src="public/immagine4.jpg" /></a>
                    </div>
                    <div class="contenutoarctiolo">
                        <div class="header-articolo">
                            <a class="readmore" href=""><img src="public/av4.jpg" /></a>
                            <a class="readmore" href="">Light House Cinema</a>
                        </div>
                        <div class="artbody">
                            <p class="maintxt">
                                New Season: ON THE RUN
                            </p>
                            <p class="ndtxt">
                                There's nothing the movies like more than a fugitive. Whether
                                it is running from the law, a dangerous ex, poor choices or an
                                evil psychopath, there's drama to be found in all of these
                                situations. Sometimes our heroes and heroines are innocent but
                                sometimes not, and we find ourselves rooting for them all the
                                same. Inspired by two new releases - Ethan Coen's Drive Away
                                Dolls and Rose Glass' Love Lies Bleeding - we've put together
                                some of our favourites…
                            </p>
                            <section class="readstory">
                                <a class="readmore" href="">READ STORY</a>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="articolo">
                    <div>
                        <a href=""><img class="immagine-articolo" src="public/immagine5.jpg" /></a>
                    </div>
                    <div class="contenutoarctiolo">
                        <div class="header-articolo">
                            <a class="readmore" href=""><img src="public/av5.jpg" /></a>
                            <a class="readmore" href="">MUBI</a>
                        </div>
                        <div class="artbody">
                            <p class="maintxt">
                                Related Images | WHO IS SABATO DE SARNO?
                            </p>
                            <p class="ndtxt">
                                "Gucci called out of the blue.... A few days later we were on
                                a plane to Milan."
                            </p>
                            <section class="readstory">
                                <a class="readmore" href="">READ STORY</a>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="articolo">
                    <div>
                        <a href=""><img class="immagine-articolo" src="public/immagine6.jpg" /></a>
                    </div>
                    <div class="contenutoarctiolo">
                        <div class="header-articolo">
                            <a class="readmore" href=""><img src="public/av6.jpg" /></a>
                            <a class="readmore" href="">The Extra Credits</a>
                        </div>
                        <div class="artbody">
                            <p class="maintxt">
                                WINGS OF DESIRE — March 27, 6PM!
                            </p>
                            <p class="ndtxt">
                                Buffalo Street Books & Cinemapolis Present: WINGS OF DESIRE!
                                Check out a pop-up book sale from Buffalo Street Books in the
                                lobby before the film begins
                            </p>
                            <section class="readstory">
                                <a class="readmore" href="">READ STORY</a>
                            </section>
                        </div>
                    </div>
                </section>
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
                <p>Phone: 342-0710390</p>
            </div>
        </div>
    </footer>
</body>

</html>