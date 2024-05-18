<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <title>FlixNexus•User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>

<?php
    include "checkSession.php";
    if(!checkSession()){
        header("Location: login.php");
        exit;
    }   
?>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="profile-picture.jpg" alt="Profile Picture" class="profile-picture">
            <h1 class="username">Username</h1>
            <p class="bio">Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="profile-content">
            <!-- Content Goes Here -->
        </div>
    </div>
</body>

</html>