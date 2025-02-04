<?php
session_start();
require 'config/database.php';

//insert data into database if submit button is clicked

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    //validate input
    if (strlen($password) < 8 || strlen($confirmpassword) < 8){
        $_SESSION['signup'] = "Password must be at least 8 characters";
    } elseif (!$avatar['name']){
        $_SESSION['signup'] = "Please select an user profile";
    } elseif($password !== $confirmpassword){
        $_SESSION['signup'] = "Password does not match";
    } else {
        //hash password

        $password = password_hash($password, PASSWORD_DEFAULT);


        //check if username or email already exists
        $user_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $user_check_result = mysqli_query($conn, $user_check);
            if (mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "Username or Email already exists";
            } 
            //check avatar
            else {
                //upload avatar
                $avatar_name = time(). '_'. $avatar['name'];
                $avatar_path = 'images/'. $avatar_name;

                //make sure avatar is an image file

                $correct_file = ['png', 'jpeg', 'jpg'];

                //splite the name of the image into an array
                $extension = explode('.', $avatar_name);
                //get the last element of the array which will be the file extension
                $extension = strtolower(end($extension));

                if (in_array($extension, $correct_file)){
                    //make sure the size is not big
                    if ($avatar['size'] < 1000000){
                        //upload the image
                        move_uploaded_file($avatar['tmp_name'], $avatar_path);

                    } else {
                        $_SESSION['signup'] = "Image file is too large";
                    }

                } else {
                    $_SESSION['signup'] = "Invalid image file format";
                } 
            } 
        }
        if (isset($_SESSION['signup'])){
            header('Location: signup.php');
            die();  
        } else {
            //insert data into database

            $sql = "INSERT INTO users (first_name, last_name, username, email, password, avatar, is_admin) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$avatar_name', 0)";
            mysqli_query($conn, $sql);

            if (mysqli_error($conn)) {
                $_SESSION['signup'] = "Sign up failed: " ;
                header('Location: signup.php');
                die();
            } else {
                $_SESSION['signup_success'] = "Sign up successful, Please login";
                header('Location: signin.php');
                die();
            }
            
        }
} 
