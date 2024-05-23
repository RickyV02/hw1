<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/logo.png" />
    <title>FlixNexus • Review</title>
    <link rel="stylesheet" href="review.css">
</head>

<?php
    include "checkSession.php";
    if(!checkSession()){
        header("Location: index.php");
        exit;
    }
    if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["image"])){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $image = $_POST["image"];
    }else{
        header("Location: index.php");
        exit;
    }
?>

<script>
const id = <?php echo $id; ?>;
const namer = <?php echo $name; ?>;
const img = <?php echo $image; ?>
</script>

<body>
    <header>
        <h1>Leave a Review for: "<?php echo $name?>"</h1>
    </header>

    <div class="film-review">
        <div class="film-info">
            <h1><?php echo $name?></h1>
            <img src="<?php echo $image?>">
        </div>

        <div class="review-form">
            <h1>Write Your Review</h1>
            <form method="post">

                <label for="review">Your Review:</label>
                <textarea id="review" name="review" rows="4" cols="50" required></textarea>
                <p id="norev" class="nascosto">Insert a rating between 1 and 10 !</p>


                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating" required>
                <p id="maxrat" class="nascosto">Insert a rating between 1 and 10 !</p>

                <input type=" submit" value="SUBMIT">
            </form>
        </div>
    </div>

    <section id="other_reviews">

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