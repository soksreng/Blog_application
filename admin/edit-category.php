<?php
include 'partial/header.php';


//fetch user id from the database by using get 
if(isset($_GET['id'])){
    $_SESSION['category_id']= filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);   
} 

if (!isset($_SESSION['category_id']) || empty($_SESSION['category_id'])) {
    $_SESSION['update_category_error'] = "Error: Category ID is missing.";
    header('Location: manage-categories.php');
    exit();
}
$category_id = $_SESSION['category_id'];
//fetch category data from the database using the category id
$sql = "SELECT * FROM category WHERE id = $category_id";
$result = mysqli_query($conn, $sql);
$category = mysqli_fetch_assoc($result);
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Category</h2>
        <?php  if(isset($_SESSION['update_category_error'])): ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['update_category_error'];
                    unset($_SESSION['update_category_error']); ?>
                </p>
            </div>
            
        <?php endif?>
        <form action="edit-category-data.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $category_id ?>">
            <input type="text"name="title" value="<?= $category['title']?>"placeholder="Title">
            <textarea rows = "4"  name="description" value="<?= $category['description']?>"placeholder="Description"></textarea>
            <button type="submit"name="submit"class="btn">Update Category</button>
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>