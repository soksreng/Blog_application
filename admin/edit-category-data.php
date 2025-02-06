<?php 
require '../config/database.php';
session_start();
// update the database

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // validate the input
    if(empty($title) || empty($description) ){
        $_SESSION['update_category_error'] = "All fields are required.";
        header("Location: edit-category.php");
        exit();
    } else {
        // update the database
        $sql = "UPDATE category SET title='$title', description='$description' WHERE id=$id LIMIT 1";
        mysqli_query($conn, $sql);

        if(mysqli_error($conn)){
            $_SESSION['update_category_error'] = "Failed to update category.";
        } else {
            $_SESSION['update_category_success'] = "Category updated successfully.";
        }
    }
} else {
    header('Location: edit-category.php');
    die();
}


?>