<?php
include 'partial/header.php';
session_start()
?>

<section class="form_section">
    <div class="container form_section-container">
        <h2>Add User</h2>
        <?php if (isset($_SESSION['add-user'])) : ?>
                <div class="alert_message error">
                    <p><?= $_SESSION['add-user'] ;
                        unset($_SESSION['add-user']);  ?>
                    </p> 
                </div>

        <?php elseif (isset($_SESSION['add-user_success'])) : ?>
                <div class="alert_message success">
                    <p><?= $_SESSION['add-user_success'] ; 
                            unset($_SESSION['add-user_success']); ?> 
                    </p> 
                </div>
                
        <?php endif ?>
        <form action="add-user-data.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name = "firstname" placeholder="First Name" required>
            <input type="text" name = "lastname" placeholder="Last Name" required>
            <input type="text" name = "username"placeholder="Username" required>
            <input type="Email" name = "email"placeholder="Email" required>
            <input type="Password" name= "password" placeholder="Password" required>
            <input type="Password" name = "confirmpassword"placeholder="Confirm Password" required>

            <select name="role" id="role" required>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form_control">
                <label for="avatar">User Profile</label>
                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                <button type="submit" name="submit"class="btn">Add-user</button>
                
            </div>
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>
