<?php
// Delete user from the database and remove avatar
include '../config/database.php';
session_start();

if (isset($_GET['id'])) {
    $category_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //update category to uncategorized if it is deleted
    $sql = "UPDATE post SET category_id = 7 WHERE category_id = $category_id";
    mysqli_query($conn, $sql);

    if (!mysqli_error($conn)) {
        $sql = "DELETE FROM category WHERE id = $category_id";
        mysqli_query($conn, $sql);
        $_SESSION['delete_category_success'] = 'Category deleted successfully';
        header('Location: manage-categories.php');
        die();
    } else {
        $_SESSION['delete_category_error'] = 'Failed to delete category';
        header('Location: manage-categories.php');
        die();
    }
    
}
?>
