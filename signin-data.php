<?php
session_start();
require 'config/database.php'; 

if (isset($_POST['submit'])) {
    $user_input = filter_var($_POST['user_input'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Can be email or username
    $password = $_POST['password']; 

    // Validate input
    if (empty($user_input) || empty($password)) {
        $_SESSION['signin_error'] = "Username/Email and password are required.";
        header('Location: signin.php');
        exit();
    }

    // Query to check if the user exists (checking both email & username)
    $query = "SELECT * FROM users WHERE username = '$user_input' OR email = '$user_input'";
    $result = mysqli_query($conn, $query);

    if ( mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['avatar'] = $user['avatar'];

            // Check if user is admin
            if ($user['is_admin'] == 1) {
                $_SESSION['user_is_admin'] = true;

                header("Location: admin/dashboard.php");

            } else{
                // Redirect to index.php upon successful login (for user)
                header("Location: index.php");
                exit();
            }

        } else {
            $_SESSION['signin_error'] = "Incorrect password.";
            header('Location: signin.php');
        }
    } else {
        $_SESSION['signin_error'] = "No account found with this username/email.";
        header('Location: signin.php');
        exit();}
}

    // Redirect back to sign-in page with an error message}
?>