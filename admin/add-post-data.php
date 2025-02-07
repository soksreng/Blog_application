<?php
include '../config/database.php';
session_start();

if(isset($_POST['submit'])){
    $author_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $thumbnail = $_FILES['thumbnail'];

    // validate input values
    if (!$title) {
        $_SESSION['add_post_error'] = "Title is required";
    } elseif (!$category_id) {
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
            //set all post featured to 0 if featured for this post is 1 
            if ($is_featured == 1) {
                $zero_sql = "UPDATE post SET is_featured = 0";
                mysqli_query($conn, $zero_sql);// update all post to 0
            } 
            // insert into post table
            $sql = "INSERT INTO post (title, body, thumbnail, category_id, author_id, is_featured)
                    VALUES ('$title', '$body', '$thumbnail_name', '$category_id', '$author_id', '$is_featured')";
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