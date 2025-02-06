<?php
session_start();
include '../config/database.php';
if (!isset($_SESSION['user_is_admin'])) {
    $_SESSION['add-category_error'] = "Unauthorized access!";
    header('Location:'. ROOT_URL. 'signin.php');
    die();
}
if(isset($_POST['submit'])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);   

    // validate the input
    if(empty($title) || empty($description)){
        $_SESSION['add-category_error'] = "All fields are required";
        header('Location: add-category.php');
        die();
    } else{
        $sql = "INSERT INTO category(title, description) VALUES('$title', '$description')";
        mysqli_query($conn, $sql);

        if(mysqli_error($conn)){
            $_SESSION['add-category_error'] = "Add category failed";
            header('Location: add-category.php');
            die();
        }else{
            $_SESSION['add-category_success'] = "Add category successful";
            header('Location: manage-categories.php');
            die();
        }
    }

}
?>