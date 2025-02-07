<?php
// Delete post from the database and remove thumbnails 
include '../config/database.php';
session_start();

if (isset($_GET['id'])) {
    $post_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch the post's thumbnail filename before deleting the post
    $fetch_thumbnail_query = "SELECT * FROM post WHERE id = $post_id";
    $result = mysqli_query($conn, $fetch_thumbnail_query);
    $post = mysqli_fetch_assoc($result);

    if ($post) {
        $thumbnail_path = '../images/' . $post['thumbnail'];  

        // Delete the thumbnail file if it exists 
        if (!empty($post['thumbnail'])) {
            unlink($thumbnail_path);  // Remove the file
        }
    }

    // Now delete the post from the database
    $sql = "DELETE FROM post WHERE id = $post_id";
    mysqli_query($conn, $sql);

    if (mysqli_error($conn)) {
        $_SESSION['delete_post_error'] = "Failed to delete post";
    } else {
        $_SESSION['delete_post_success'] = "Post deleted successfully";
    }

    header('Location: dashboard.php');
    die();
}
?>
