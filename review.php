<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <link rel="stylesheet" href="review.css">
    <script src="review.js" defer></script>
    <title>FlixNexus • Review</title>
</head>

<?php
    include "checkSession.php";
    if(!checkSession()){
        header("Location: index.php");
        exit;
    }
    if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["image"])){
        if(is_numeric($_POST["id"])){
            $id = $_POST["id"];
        }else{
            $id = "'" . $_POST["id"] . "'";
        }
        $name = $_POST["name"];
        $image = $_POST["image"];
    }else{
        header("Location: index.php");
        exit;
    }
?>

<script>
const id = <?php echo $id; ?>;
const namer = "<?php echo $name; ?>";
const img = "<?php echo $image; ?>";
</script>

<body>
    <header>
        <h1>Leave a Review for: "<?php echo $name?>"</h1>
    </header>

    <div class="film-review">
        <div class="film-info">
            <h1><?php echo $name?></h1>
            <img src="<?php echo $image?>">
            <img id="heart" src="public/empty.svg">
        </div>

        <div class="review-form">
            <h1></h1>
            <form method="post">

                <label for="review">Your Review:</label>
                <textarea id="review" name="review" rows="4" cols="50"></textarea>
                <p id="norev" class="nascosto">Insert a review with maximum 255 chars!</p>


                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating" step="0.1">
                <p id="maxrat" class="nascosto">Insert a rating between 0 and 10 !</p>

                <input type="submit" value="SUBMIT">
            </form>
        </div>
    </div>

    <section id="other_reviews">
        <h1></h1>
        <div id="reviews-box">
        </div>
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