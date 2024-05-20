<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="stylesheet" href="search.css">
    <script src="result.js" defer></script>
    <title>FlixNexus • Search&Results</title>
</head>

<?php
    include "checkSession.php";
    if(!checkSession() || !isset($_GET["id"]) || !isset($_GET["qid"]) ){
        header("Location: index.php");
        exit;
    }else{
        $searchid = $_GET["id"];
        $searchqid = $_GET["qid"];
    }
?>

<script>
const search_id = "<?php echo $searchid; ?>";
const search_qid = "<?php echo $searchqid; ?>";
</script>

<body>
    <header>
    </header>
    <section id="modal_search">
    </section>
</body>

</html>