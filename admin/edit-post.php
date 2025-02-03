<?php
include 'partial/header.php';
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Post</h2>
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="Title">

            <select name="" id="">
                <option value="1">Travel</option>
                <option value="1">Art</option>
                <option value="1">Science & Techonology</option>
                <option value="1">T</option>
                <option value="1">Travel</option>
                <option value="1">Travel</option>
            </select>

            <textarea rows = "10"  placeholder="Body"></textarea>
            <div class="form_control inline">
                <input type="checkbox" id="is_featured" name="is_featured" checked>
                <label for="is_featured">Featured</label>
            </div>

            <div class="form_control">
                <label for="thumbnail"> Update Thumnail</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/png, image/jpeg">
            </div>
            <button type="submit" class="addcat_button">Update Post</button>
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>