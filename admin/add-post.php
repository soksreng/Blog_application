<?php
include 'partial/header.php';

//fetech categories from the database

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

//get the data back if the form is invalid
$title = $_SESSION['add_post_data']['title'] ?? null;
$body = $_SESSION['add_post_data']['body'] ?? null;

unset($_SESSION['add_post_data']);
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Add Post</h2>
        <!-- show error message if add post fails-->
         <?php if(isset($_SESSION['add_post_error'])):?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['add_post_error'];
                        unset($_SESSION['add_post_error']);?>
                    </p>
                </div>
            <?php endif;?>
        <form action="add-post-data.php" method="POST"enctype="multipart/form-data">
            <input type="text" name="title"placeholder="Title">

            <select name="category_id">
                <!--loop through the category tale in the database-->
                <?php while($row = mysqli_fetch_assoc($result)):?>
                    <option value="<?= $row['id']?>"><?= $row['title']?></option>
                <?php endwhile;?>


            </select>

            <textarea rows = "10" name="body"placeholder="Body"><?=$body?></textarea>
            <?php if(isset($_SESSION['user_is_admin'])) :?>
                <div class="form_control inline">
                    <input type="checkbox" id="is_featured" name="is_featured" value ="1" checked>
                    <label for="is_featured">Featured</label>
                </div>
            <?php endif?>

            <div class="form_control">
                <label for="thumbnail"> Add Thumnail</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/png, image/jpeg">
            </div>
            <button type="submit" name="submit"class="btn">Add Post</button>
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>
