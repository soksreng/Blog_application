<?php
// Delete user from the database and remove avatar
include '../config/database.php';
session_start();

if (isset($_GET['id'])) {
    $category_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    //  delete the category from the database
    $sql = "DELETE FROM category WHERE id = $category_id";
    mysqli_query($conn, $sql);

    if (mysqli_error($conn)) {
        $_SESSION['delete_category_error'] = 'Failed to delete category';
    } else {
        $_SESSION['delete_category_success'] = 'Category deleted successfully';
    }

    header('Location: manage-categories.php');
    die();
}
?>
