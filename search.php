<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="stylesheet" href="search.css">
    <script src="search.js" defer></script>
    <title>FlixNexus • Search&Results</title>
</head>

<?php
    include "checkSession.php";
    if(!checkSession() || !isset($_POST["search"]) ){
        header("Location: index.php");
        exit;
    }else{
        $searchname = $_POST["search"];
    }
?>

<script>
const searchname = "<?php echo $searchname; ?>";
</script>

<body>
    <header>
        <h1>You searched for "<?php echo $searchname;?>"</h1>
        <form method="post">
            <input type="text" autocomplete="off" name="search">
            <input type="submit" class="submit" value="">
        </form>
    </header>
    <section id="modal_search">
    </section>
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
                <p>Phone: 3420710390</p>
            </div>
        </div>
    </footer>
</body>

</html>