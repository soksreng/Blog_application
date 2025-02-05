<?php
// Delete user from the database and remove avatar
include '../config/database.php';
session_start();

if (isset($_GET['id'])) {
    $user_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch the user's avatar filename before deleting the user
    $fetch_avatar_query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $fetch_avatar_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $avatar_path = '../images/' . $user['avatar'];  

        // Delete the avatar file if it exists and is not a default avatar
        if (!empty($user['avatar']) && file_exists($avatar_path)) {
            unlink($avatar_path);  // Remove the file
        }
    }

    // Now delete the user from the database
    $sql = "DELETE FROM users WHERE id = $user_id";
    mysqli_query($conn, $sql);

    if (mysqli_error($conn)) {
        $_SESSION['delete_error'] = 'Failed to delete user';
    } else {
        $_SESSION['delete_success'] = 'User and avatar deleted successfully';
    }

    header('Location: manage-users.php');
    die();
}
?>
