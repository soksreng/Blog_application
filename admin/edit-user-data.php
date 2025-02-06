<?php 
require '../config/database.php';
session_start();
// update the database

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_NUMBER_INT);

    // validate the input
    if(empty($firstname) || empty($lastname) ){
        $_SESSION['update_user_error'] = "All fields are required.";
        header('Location: edit-user.php');
        die();
    } else {
        // update the database
        $sql = "UPDATE users SET first_name='$firstname', last_name='$lastname', is_admin=$role WHERE id=$id LIMIT 1";
        mysqli_query($conn, $sql);

        if(mysqli_error($conn)){
            $_SESSION['update_user_error'] = "Failed to update user.";
        } else {
            $_SESSION['update_user_success'] = "User updated successfully.";
        }
    }
} else {
    header('Location: edit-users.php');
    die();
}


?>