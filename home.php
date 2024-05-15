<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="hw1.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cutive&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <script src="hw1.js" defer></script>
    <title>Letterboxd•Social Film Discovery</title>
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
        <img class="logo-mobile" src="public/letterbox.png" />
    </div>
    <section id="modal_search" class="nascosto">
    </section>
    <header>
        <nav class="mobilenav">
            <a href=""><img src="public/int1.pnh-removebg-preview.png"></a>
            <a href=""><img src="public/Screenshot_2024-03-20_193210-removebg-preview.png" /></a>
            <a href=""><img src="public/Screenshot_2024-03-20_193308-removebg-preview.png" /></a>
        </nav>
        <section class="navsection">
            <h1 class="logo">
                <img src="public/letterbox.png">
            </h1>
            <nav>
                <a href="logout.php"><span>LOGOUT</span></a>
                <a href=""><span>FILMS</span></a>
                <a href=""><span>LISTS</span></a>
                <a href=""><span>MEMBERS</span></a>
                <a href=""><span>JOURNAL</span></a>
                <form>
                    <input type="text" autocomplete="off" id="movie_name">
                    <input type="submit" class="submit" value="">
                </form>
            </nav>
        </section>
    </header>
    <div class="wrapper">
        <h2>
            Track films you’ve watched. <br />
            Save those you want to see. <br />
            Tell your friends what’s good.
        </h2>
        <p id="spam">Welcome <?php echo $_SESSION["username"]; ?> !</p>
        <div class="moviebox">
            <div><a href="" data-info="★★★★½"><img src="public/foto1.jpg" /></a></div>
            <div><a href="" data-info="★★★½"><img src="public/foto2.jpg" /></a></div>
            <div><a href="" data-info="★★"><img src="public/foto3.jpg" /></a></div>
            <div><a href="" data-info="★★★★"><img src="public/foto4.jpg" /></a></div>
            <div><a href="" data-info="★★★"><img src="public/foto5.jpg" /></a></div>
            <div><a href="" data-info="★★½"><img src="public/foto6.jpg" /></a></div>
        </div>
        <section id="feature">
            <h1>LETTERBOXD LETS YOU...</h1>
            <div class="feature__box">
                <a class="verde" href=""><img src="public/icona1.png" />
                    <p class="panel">
                        Keep track of every film you've ever watched (or just start from
                        the day you join)
                    </p>
                </a>
                <a class="arancione" href=""><img src="public/icona2.png" />
                    <p class="panel">
                        Show some love for yout favorite films, lists and reviews with a
                        "like"
                    </p>
                </a>
                <a class="azzurro" href=""><img src="public/icona6.png" />
                    <p class="panel">
                        Write and share reviews, and follow friends and other members to
                        read theis
                    </p>
                </a>
                <a class="verde" href=""><img src="public/icona3.png" />
                    <p class="panel">
                        Rate each film on a five-star scale (with halves) to record and
                        share your reaction
                    </p>
                </a>
                <a class="arancione" href=""><img src="public/icona5.png" />
                    <p class="panel">
                        Keep a diary of your film watching (and upgrade to
                        <span>Pro</span> for comprehensive stats)
                    </p>
                </a>
                <a class="azzurro" href=""><img src="public/icona4.png" />
                    <p class="panel">
                        Compile and share lists of films on any topic and keep a watchlist
                        of films to see
                    </p>
                </a>
            </div>
        </section>
        <section class="livefeed">
            <h2>
                <span>JUST REVIEWED...</span>
                <a data-info="1.987.680.867 reviews to read!" id="show_more" href="">MORE</a>
            </h2>
            <div>
                <a href=""><img src="public/spam1.jpg" /></a>
                <a href=""><img src="public/spam2.jpg" /></a>
                <a href=""><img src="public/spam3.jpg" /></a>
                <a href=""><img src="public/spam4.jpg" /></a>
                <a href=""><img src="public/spam5.jpg" /></a>
                <a href=""><img src="public/spam6.jpg" /></a>
                <a href=""><img src="public/spam7.jpg" /></a>
                <a href=""><img src="public/spam8.jpg" /></a>
                <a href=""><img src="public/spam9.jpg" /></a>
                <a href=""><img src="public/spam10.jpg" /></a>
                <a href=""><img src="public/spam11.jpg" /></a>
                <a href=""><img src="public/spam12.jpg" /></a>
            </div>
        </section>
        <h1>
            Write and share reviews. Compile your own lists. Share your life in
            film.
        </h1>
        <p class="word">
            Below are some popular reviews and lists from this week.
            <a href="" class="crea-account">Sign up</a> to create your own.
        </p>
        <div class="reviews">
            <div class="colonna1">
                <div class="reviews__top">
                    <h2 class="news">
                        <a href="">POPULAR REVIEWS THIS WEEK</a>
                        <a data-info="1780 new reviews!" id="show_more" href="">MORE</a>
                    </h2>
                </div>
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
                                    <span classe="stelline"> ★★★★½ </span>
                                    <a class="commento" href=""><img src="public/commento.png" />36</a>
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
                                    <span classe="stelline"> ★★★ </span>
                                    <a class="commento" href=""><img src="public/commento.png" />35</a>
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
                                    <span classe="stelline"> ★★★★★ </span>
                                    <a class="commento" href=""><img src="public/commento.png" />150</a>
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
                                    <span classe="stelline"> ★★★★ </span>
                                    <a class="commento" href=""><img src="public/commento.png" />11</a>
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
                                    <span classe="stelline"> ★★★★ </span>
                                    <a class="commento" href=""><img src="public/commento.png" />3</a>
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
                                    <span classe="stelline"> ★★★ </span>
                                    <a class="commento" href=""><img src="public/commento.png" />1</a>
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
            <div class="colonna2">
                <div class="poplist">
                    <h2 class="lists">
                        <a href="">POPULAR LISTS</a><a data-info="178 new lists" id="show_more" href="">MORE</a>
                    </h2>
                    <div class="toplist">
                        <section class="collezione">
                            <a href="" class="ac" href=""><img data-index="1" src="public/films1.png" /></a>
                            <h3>
                                <a href=""><span>sad girl cinema</span></a>
                            </h3>
                            <div class="user">
                                <a><img class="au" src="public/avatar6.jpg" /></a>
                                <p>
                                    <span>india</span><img class="ic" src="public/icona2.png" />16K
                                    <img class="ic" src="public/commento.png" />65
                                </p>
                            </div>
                        </section>
                        <section class="collezione">
                            <a class="ac" href=""><img data-index="2" src="public/films2.png" /></a>
                            <h3>
                                <a href=""><span>classic movie for beginners</span></a>
                            </h3>
                            <div class="user">
                                <a><img class="au" src="public/avatar3.jpg" /></a>
                                <p>
                                    <span>ConnorEatsPants</span><img class="ic"
                                        src="public/icona2.png" /><span>4k</span>
                                    <img class="ic" src="public/commento.png" /><span>32</span>
                                </p>
                            </div>
                        </section>
                        <section class="collezione">
                            <a class="ac" href=""><img data-index="3" src="public/films3.png" /></a>
                            <h3>
                                <a href=""><span>good movies that are free on archive.org</span></a>
                            </h3>
                            <div class="user">
                                <a><img class="au" src="public/avatar1.jpg" /></a>
                                <p>
                                    <span>Bryan Espintia</span><img class="ic" src="public/icona2.png" />11K
                                    <img class="ic" src="public/commento.png" />72
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
                <section class="poprev">
                    <h2>
                        <a href="">POPULAR REVIEWERS</a>
                        <a data-info="45 news!" id="show_more" href="">MORE</a>
                    </h2>
                    <div class="poprev__wrap">
                        <div class="poprev__wrap-div">
                            <div>
                                <a class="avr" href=""><img src="public/avatar5.jpg" /></a>
                            </div>
                            <div class="poprev__wrap_b">
                                <a class="avrname" href="">Jordan</a>
                                <a class="infos" href="">1,005 films, 765 reviews</a>
                            </div>
                        </div>
                        <div class="poprev__wrap-div">
                            <div>
                                <a class="avr" href=""><img src="public/avatar4.jpg" /></a>
                            </div>
                            <div class="poprev__wrap_b">
                                <a class="avrname" href="">24framesofnick</a>
                                <a class="infos" href="">104 films, 89 reviews</a>
                            </div>
                        </div>
                        <div class="poprev__wrap-div">
                            <div>
                                <a class="avr" href=""><img src="public/avatar3.jpg" /></a>
                            </div>
                            <div class="poprev__wrap_b">
                                <a class="avrname" href="">ConnorEatsPants</a>
                                <a class="infos" href="">2,005 films, 475 reviews</a>
                            </div>
                        </div>
                        <div class="poprev__wrap-div">
                            <div>
                                <a class="avr" href=""><img src="public/avatar1.jpg" /></a>
                            </div>
                            <div class="poprev__wrap_b">
                                <a class="avrname" href="">Hayle</a>
                                <a class="infos" href="">145 films, 65 reviews</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section class="recentstories">
            <h2 class="news new-width">
                <a href="">RECENT STORIES</a>
                <a data-info="1.800 new articles!" id="show_more" href="">MORE</a>
            </h2>
            <div class="rs__body">
                <section class="articolo">
                    <div>
                        <a href=""><img class="immagine-articolo" src="public/immagine1.jpg" /></a>
                    </div>
                    <div class="contenuto-articolo">
                        <div class="header-articolo">
                            <a class="readmore" href=""><img class="au" src="public/av1.jpg" /></a>
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
                            <a class="readmore" href=""><img class="au" src="public/av2.jpg" /></a>
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
                            <a class="readmore" href=""><img class="au" src="public/av3.jpg" /></a>
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
                            <a class="readmore" href=""><img class="au" src="public/av4.jpg" /></a>
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
                            <a class="readmore" href=""><img class="au" src="public/av5.jpg" /></a>
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
                            <a class="readmore" href=""><img class="au" src="public/av6.jpg" /></a>
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
        <section class="recentshowdowns">
            <h2 class="news new-width">
                <a href="">RECENT SHOWDOWNS</a>
                <a data-info=" 150 new articles!" id="show_more" href="">MORE</a>
            </h2>
            <section class="sectionews">
                <div class="newsblock">
                    <a class="linkimg" href=""><img class="newsimg" src="public/news1.jpg" /></a>
                    <a class="news-title" href="">
                        <h2>Daughters of the Dust</h2>
                    </a>
                    <p>Best under-seen women-directed films</p>
                </div>
                <div class="newsblock">
                    <a class="linkimg" href=""><img class="newsimg" src="public/news2.jpg" /></a>
                    <a class="news-title" href="">
                        <h2>Calling the Shots</h2>
                    </a>
                    <p>Best Oscar-nominated film directing</p>
                </div>
                <div class="newsblock">
                    <a class="linkimg" href=""><img class="newsimg" src="public/news3.jpg" /></a>
                    <a class="news-title" href="">
                        <h2>Cutter's Way</h2>
                    </a>
                    <p>Best Oscar-nominated film editing</p>
                </div>
            </section>
        </section>
        <section class="recentshowdowns">
            <h2 class="news new-width">
                <a href="">RECENT NEWS</a>
                <a data-info="120 news to read!" id="show_more" href="">MORE</a>
            </h2>
            <section class="sectionews">
                <div class="newsblock">
                    <a class="linkimg" href=""><img class="newsimg" src="public/news4.jpg" /></a>
                    <a class="news-title" href="">
                        <h2>Watchlist This!</h2>
                    </a>
                    <p>Our picks of the best new under-the-radar films for your watchlists.
                    </p>
                </div>
                <div class="newsblock">
                    <a class="linkimg" href=""><img class="newsimg" src="public/news5.jpg" /></a>
                    <a class="news-title" href="">
                        <h2>Stupid Fun</h2>
                    </a>
                    <p>Anyone But You director Will Gluck on sleeper hits, Shakespeare and making sex symbols do
                        silly
                        things.
                    </p>
                </div>
                <div class="newsblock">
                    <a class="linkimg" href=""><img class="newsimg" src="public/news6.jpg" /></a>
                    <a class="news-title" href="">
                        <h2>Most Picture 2024</h2>
                    </a>
                    <p>Revealing and celebrating this year’s Most Picture winner: Barbie.
                    </p>
                </div>
            </section>
        </section>
        </section>
    </div>
    <footer>
        <div>
            <nav>
                <a class="footer-links" href="">About</a>
                <a class="footer-links nascondi_mobile" href="">News</a>
                <a class="footer-links" href="">Pro</a>
                <a class="footer-links" href="">Apps</a>
                <a class="footer-links nascondi_mobile" href="">Podcast</a>
                <a class="footer-links nascondi_mobile" href="">Year in Review</a>
                <a class="footer-links nascondi_mobile" href="">Gift Guide</a>
                <a class="footer-links" href="">Help</a>
                <a class="footer-links nascondi_mobile" href="">Terms</a>
                <a class="footer-links" href="">API</a>
                <a class="footer-links" href="">Contact</a>
            </nav>
        </div>
    </footer>
</body>

</html>