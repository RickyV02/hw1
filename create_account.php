<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link href="https://db.onlinewebfonts.com/c/f82a45d96a5a30abb6417c5b81fc416d?family=Graphik+LC+Web+Semibold+Regular"
        rel="stylesheet">
    <link rel="icon" href="public/logo.png" />
    <script src="create_account.js" defer></script>
    <title>FlixNexus • Create Account</title>
</head>

<?php

include "checkSession.php";
if(checkSession() || isset($_COOKIE["remember_me"])){
    header("Location: home.php");
    exit;
}

if(isset($_POST['email'])&&isset($_POST['Username']) && isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['terms']))
{
    $errors=array();
    global $dbconfig;
        
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['Username'])) {
        $errors[] = "Username format not valid!";
    } else if(strlen($_POST['Username']) < 4 || strlen($_POST['Username']) > 16){
        $errors[] = "Enter username between 4 and 16 characters!";
    }else {
        $username = mysqli_real_escape_string($conn, $_POST['Username']);
        $query = "SELECT USERNAME FROM ACCOUNTS WHERE USERNAME = '$username'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {
            $errors[] = "Username already taken!";
        }
    }

    if (strlen($password) < 8) {
        $errors[] = "Enter a password with at least 8 characters!";
    } 

    if (strcmp($password, $_POST["rpassword"]) != 0) {
        $errors[] = "Passwords doesnt match!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email format not valid!";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($email));
        $res = mysqli_query($conn, "SELECT EMAIL FROM ACCOUNTS WHERE EMAIL = '$email'")or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {
            $errors[] = "Email already taken!";
        }
    }
    
    if (count($errors) == 0) { 
        if ($_FILES['avatar']['size'] != 0) {
            $file = $_FILES['avatar'];
            
            $allowedExtensions = ['png', 'jpeg', 'jpg', 'gif'];
            $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors[] = "Allowed formats are .png, .jpeg, .jpg, and .gif!";
            } else {           
                if ($file['error'] === 0) {
                    if ($file['size'] <= 5*1024*1024) {
                        $newname = uniqid('', true).".".$fileExtension;
                        $avatar = 'public/'.$newname;
                        move_uploaded_file($file['tmp_name'], $avatar);
                    } else {
                        $errors[] = "The image must not exceed 5MB!";
                    }
                } else {
                    $errors[] = "Error loading the file!";
                }
            }
        } else {
            $errors[] = "No image loaded!";
        }
    }
    

    if (count($errors) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO ACCOUNTS(EMAIL,USERNAME,PWD,AVATAR) VALUES('$email','$username','$password','$avatar')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION["username"] = $username;
            mysqli_close($conn);
            header("Location: home.php");
            exit;
        } else {
            $errors[] = "Error connecting to the Database";
        }
    }

    mysqli_close($conn);
    
}else if (isset($_POST["Username"])){
    $errors[] = "Fill all the fields!";
}
?>

<body>
    <form name="login" method="post" class="login-box" enctype="multipart/form-data">
        <h2>Sign Up</h2>
        <p>Keep in touch with your friends</p>
        <?php 
        if(isset($errors)) 
        {
            foreach($errors as $err) {
                {
                    echo "<p class='errormsg'>";
                    echo $err;
                    echo "</p>";
                }
            }
        } 
        ?>
        <input type="email" placeholder="Email" name="email" autocomplete="off" required
            <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
        <p id="em" class="nascosto">Email format not valid!</p>
        <p id="em2" class="nascosto">Email already taken!</p>
        <input type="text" placeholder="Username" name="Username" autocomplete="off" required
            <?php if(isset($_POST["Username"])){echo "value=".$_POST["Username"];} ?>>
        <p id="user" class="nascosto">Username already taken!</p>
        <p id="nouser" class="nascosto">Enter username between 4 and 16 characters!!</p>
        <div class="password-container">
            <input type="password" placeholder="Password" name="password" class="pwd" autocomplete="off"
                <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
        </div>
        <p id="minlength" class="nascosto">Enter a password with at least 8 characters!</p>
        <p id="pwd" class="nascosto">Password must contain at least one Upper Case letter and a special character!
        </p>
        <div class="password-container">
            <input type="password" placeholder="Repeat Password" name="rpassword" class="pwd" autocomplete="off"
                required <?php if(isset($_POST["rpassword"])){echo "value=".$_POST["rpassword"];} ?>>
            <img class="show-password" src="public/eye_visible_hide_hidden_show_icon_145988.svg">
        </div>
        <p id="pwdmatch" class="nascosto">Passwords doesnt match!</p>
        <label id="avatar" for="avatar">Upload a Profile Picture</label>
        <input type="file" id="file" name="avatar" accept=' .jpg, .jpeg, image/gif, image/png'>
        <p id="nosize" class="nascosto">The image must not exceed 5MB !</p>
        <p id="noext" class="nascosto">Allowed formats are . png, . jpeg, . jpg and . gif !</p>
        <div class=" check">
            <input type="checkbox" name="terms" id="terms"
                <?php if(isset($_POST["terms"])){echo $_POST["terms"] ? "checked" : "";} ?>>
            <label for="terms">I agree to the terms and conditions of FlixNexus</label>
        </div>
        <p id="noterms" class="nascosto">Accept the terms and conditions to proceed !</p>
        <input type="submit" value="SIGN UP" class="button">
        <p>Already Have an Account? <a href="login.php">Sign in now!</a></p>
        <a href="index.php">Home Page</a>
    </form>

</body>

</html>