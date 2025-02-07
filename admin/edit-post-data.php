<?php
require '../config/database.php';
session_start();

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    //have to delete the old thumbnail if the new one is added
    $previous_thumbnail = filter_var($_POST['previous_thumbnail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category = filter_var($_POST['category_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $thumbnail = $_FILES['thumbnail'];
    // validate input values
    if(empty($title) || empty($category) || empty($body)){
        $_SESSION['update_post_error'] = "All fields are required";
    } else{
        // check if the thumbnail is uploaded then delete the old one
        if(($thumbnail['name'])){
            unlink('../images/'. $previous_thumbnail);

            //work on updated thumbnail

            $time = time();
            $thumbnail_name = $time. "_". $thumbnail['name'];
            $thumbnail_tmp = $thumbnail['tmp_name'];
            $thumbnail_path = '../images/'. $thumbnail_name;
            //make sure the file is an image
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = strtolower(end($extension));
            if(in_array($extension, $allowed_files)){
                //make sure the size is not big
                if($thumbnail['size'] < 1000000){
                    //upload the image
                    move_uploaded_file($thumbnail_tmp, $thumbnail_path);
                } else{
                    $_SESSION['update_post_error'] = "File size too big. Should be less than 1MB";
                }
            } else{
                $_SESSION['update_post_error'] = "File should be png, jpg, jpeg";
            }
        } 
    } 
} else{
    $_SESSION['update_post_error'] = "Invalid form submission";
    header('Location: dashboard.php');
    die();
}

if(isset($_SESSION['update_post_error'])){
    $_SESSION['update_post_data'] = $_POST;
    header('Location: dashboard.php');
    die();
} else {
    //set all post featured to 0 if featured for this post is 1
    if($is_featured == 1){
        $zero_sql = "UPDATE post SET is_featured = 0";
        mysqli_query($conn, $zero_sql);
    }
    //if no new thumbnail is uploaded then keep the previous one
    $thumbnail_name = $thumbnail_name ?? $previous_thumbnail;
    //update post in database
    $sql = "UPDATE post SET title = '$title', body = '$body', category_id = $category, thumbnail = '$thumbnail_name', is_featured = $is_featured WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_errno($conn)){
        $_SESSION['update_post_error'] = "Post updated unsuccessfully";
        header('Location: dashboard.php');
        die();
    } else{
        $_SESSION['update_post_success'] = "Post updated successfully";
        header('Location: dashboard.php');
        die();
    }
}
?>