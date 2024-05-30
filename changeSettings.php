<?php
    include("checkSession.php");
    if (!$userid=checkSession()) {
        header("Location: index.php");
        exit;
    }
    
    $errors=array();
    $updates=array();
    global $dbconfig;
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    
    if(isset($_POST["email"])){
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email format not valid!";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($email));
            $res = mysqli_query($conn, "SELECT EMAIL FROM ACCOUNTS WHERE EMAIL = '$email'")or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                $errors[] = "Email already taken!";
            }else{
                $query = "UPDATE ACCOUNTS SET EMAIL = '$email' WHERE USERNAME = '$userid'";
                if (mysqli_query($conn, $query)) {
                    $updates["email"]="Email changed successfully!";
                } else {
                    $errors[] = "Error connecting to the Database";
                }
            }
        }
    }
    if(isset($_POST["password"])){
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        if (strlen($password) < 8) {
            $errors[] = "Enter a password with at least 8 characters!";
        }else if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password) && !preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one Upper Case letter and a special character!";
        }else{
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE ACCOUNTS SET PWD = '$password' WHERE USERNAME = '$userid'";
                if (mysqli_query($conn, $query)) {
                    $updates["password"]="Password changed successfully!";
                } else {
                    $errors[] = "Error connecting to the Database";
                }
        }
    }
    if(!empty($_FILES['file']["name"])){
        if($_FILES['file']['size'] != 0){
            $file = $_FILES['file'];   
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
                        $query = "UPDATE ACCOUNTS SET AVATAR = '$avatar' WHERE USERNAME = '$userid'";
                        if (mysqli_query($conn, $query)) {
                            $updates["avatar"]="Avatar changed successfully!";
                        } else {
                            $errors[] = "Error connecting to the Database";
                        }
                    } else {
                        $errors[] = "The image must not exceed 5MB!";
                    }
                } else {
                    $errors[] = "Error loading the file!";
                }
            }
        }
    }
    mysqli_close($conn);
    if(count($errors)==0){
        echo json_encode(array("UpdateLog" => $updates,"UpdateError" => $errors));
    }else{
        echo json_encode(array("UpdateLog" => $updates,"UpdateError" => $errors));
    }
    exit;
?>