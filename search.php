<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="stylesheet" href="search.css">
    <script src="search.js" defer></script>
    <title>FlixNexus•Search&Results</title>
</head>

<?php
    include "checkSession.php";
    if(!checkSession()){
        header("Location: index.php");
        exit;
    }
?>

<body>
    <header>
        <h1>You searched for "<?php echo $_SESSION["search"]; ?>"</h1>
        <form>
            <input type="text" autocomplete="off">
            <input type="submit" class="submit" value="">
        </form>
    </header>
    <main>
        <div class="movie-card">
            <h2>Movie 1 Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </main>
</body>

</html>