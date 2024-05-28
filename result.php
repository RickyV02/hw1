<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <link rel="stylesheet" href="search.css">
    <script src="result.js" defer></script>
    <title>FlixNexus • Search&Results</title>
</head>

<?php
    include "checkSession.php";
    if(!checkSession()){
        header("Location: index.php");
        exit;
    }
    if(isset($_GET["name"]) && isset($_GET["qid"])){
        $search = $_GET["name"];
        $searchqid = $_GET["qid"];
        
    }else if(isset($_GET["id"])){
        $search = $_GET["id"];
        $searchqid = null;
    }
?>

<body>
    <header>
        <h1>Here's what we found</h1>
    </header>
    <section data-search="<?php echo $search; ?>" data-search_qid="<?php echo $searchqid; ?>" id="modal_search">
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
                <p>Phone: (555) 123-4567</p>
            </div>
        </div>
    </footer>
</body>

</html>