<?php
session_start();
include 'partial/header.php';
?>

    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Category</h2>
            <?php  if(isset($_SESSION['add-category_error'])): ?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['add-category_error'];
                        unset($_SESSION['add-category_error']); ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="add-category-data.php"  method = "POST" enctype="multipart/form-data">
                <input type="text" name ="title"placeholder="Title">
                <textarea rows = "4"  name="description"placeholder="Description"></textarea>
                <button type="submit" name="submit"class="btn">Add Category</button>
            </form>
        </div>
    </section>

<?php
    include '../partial/footer.php';
?>
</body>
</html>