<?php
include '../config/database.php';
session_start();

if(isset($_POST['submit'])){
    $author_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $thumbnail = $_FILES['thumbnail'];

    // validate input values
    if (!$title) {
        $_SESSION['add_post_error'] = "Title is required";
    } elseif (!$category) {
        $_SESSION['add_post_error'] = "Category is required";
    } elseif (!$body) {
        $_SESSION['add_post_error'] = "Body is required";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add_post_error'] = "Thumbnail is required";
    }
    else {
        // work on thumbnail
        if ($thumbnail['name']) {
            // make sure file is an image
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail['name']);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {
                // make unique name for image before uploading
                $time = time();
                $thumbnail_name = $time ."_" . $thumbnail['name'];
                $thumbnail_path = '../images/' . $thumbnail_name;

                // upload image
                if ($thumbnail['size'] < 1000000) {
                    move_uploaded_file($thumbnail['tmp_name'], $thumbnail_path);
                } else {
                    $_SESSION['add_post_error'] = "File size too big. Should be less than 1MB";
                }
            } else {
                $_SESSION['add_post_error'] = "File should be png, jpg, jpeg";
            }
        }

        if (!isset($_SESSION['add_post_error'])) {
            // insert into post table
            $sql = "INSERT INTO post (title, body, category_id, thumbnail, author_id, is_featured)
                    VALUES ('$title', '$body', '$category', '$thumbnail_name', '$author_id', '$is_featured')";
            mysqli_query($conn, $sql);

            if (mysqli_error($conn)) {
                $_SESSION['add_post_error'] = "Failed to add post";
            } else {
                $_SESSION['add_post_success'] = "Post added successfully";
                header('location: ' . ROOT_URL . 'admin/dashboard.php');
                die();
            }
        }
    }

    // redirect back to add-post page if there was any error
    if (isset($_SESSION['add_post_error'])) {
        $_SESSION['add_post_data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-post.php');
        die();
    }
}
?>