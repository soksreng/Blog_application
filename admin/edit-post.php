<?php
include 'partial/header.php';

//fetech category title from database

$sql_category = "SELECT * FROM category ORDER BY title";
$category_result = mysqli_query($conn, $sql_category);

//fetech post data from the database using get
if(isset($_GET['id'])){
    $_SESSION ['post_id'] = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

} 
if (!isset($_SESSION['post_id']) || empty($_SESSION['post_id'])) {
    $_SESSION['update_post_error'] = "Error: user ID is missing.";
    header('Location: dahboard.php');
    die();
}

//fetch user data from the database
$post_id = $_SESSION['post_id'];
$sql = "SELECT * FROM post WHERE id = $post_id";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Post</h2>
        <form action="edit-post-data.php" method="POST"enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="text" name="title" value ="<?= $post['title']?>"placeholder="Title"> 

            <select name="category_id">
                
                <?php while ($category = mysqli_fetch_assoc($category_result)) :?>
                    <option value="<?= $category['id']?>"><?= $category['title'] ?></option>
                    
                <?php endwhile;?>

            </select>

            <textarea rows = "10" name="body"placeholder="Body"><?=$post['body']?></textarea>
            <div class="form_control inline">
                <input type="checkbox" id="is_featured" name="is_featured" checked>
                <label for="is_featured">Featured</label>
            </div>

            <div class="form_control">
                <label for="thumbnail"> Update Thumnail</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/png, image/jpeg">
            </div>
            <button type="submit" name="submit"class="btn">Update Post</button>
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>