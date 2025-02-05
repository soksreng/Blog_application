<?php 

require '../config/database.php';
session_start();

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    //validate input
    if (strlen($password) < 8 || strlen($confirmpassword) < 8){
        $_SESSION['add-user'] = "Password must be at least 8 characters";
    } elseif (!$avatar['name']){
        $_SESSION['add-user'] = "Please select an user profile";
    } elseif($password !== $confirmpassword){
        $_SESSION['add-user'] = "Password does not match";
    } else {
        //hash password

        $password = password_hash($password, PASSWORD_DEFAULT);


        //check if username or email already exists
        $user_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $user_check_result = mysqli_query($conn, $user_check);
            if (mysqli_num_rows($user_check_result) > 0){
                $_SESSION['add-user'] = "Username or Email already exists";
            } 
            //check avatar
            else {
                //upload avatar
                $avatar_name = time(). '_'. $avatar['name'];
                $avatar_path = '../images/'. $avatar_name;

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
                        $_SESSION['add-user'] = "Image file is too large";
                    }

                } else {
                    $_SESSION['add-user'] = "Invalid image file format";
                } 
            } 
        }
        if (isset($_SESSION['add-user'])){
            header('Location: add-user.php');
            die();  
        } else {
            //insert data into database

            $sql = "INSERT INTO users (first_name, last_name, username, email, password, avatar, is_admin) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$avatar_name', '$role')";
            mysqli_query($conn, $sql);

            if (mysqli_error($conn)) {
                $_SESSION['add-user'] = "Add user failed " ;
                header('Location: manage-user.php');
                die();
            } else {
                $_SESSION['add-user_success'] = "Add user successful";
                header('Location: add-user.php');
                die();
            }
            
        }
} 
