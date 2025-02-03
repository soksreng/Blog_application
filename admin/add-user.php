<?php
include 'partial/header.php';
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Add User</h2>
        <div class="alert_message error">
            <p>This is an error message</p>
        </div>
        <form action="">
            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <input type="text" placeholder="Username">
            <input type="Email" placeholder="Email">
            <input type="Password" placeholder="Password">
            <input type="Password" placeholder="Confirm Password">

            <select >
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form_control">
                <label for="avatar">User Profile</label>
                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                <button type="submit" class="signup_btn">Add-user</button>
                
            </div>
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>
