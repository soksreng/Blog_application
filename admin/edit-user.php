<?php
include 'partial/header.php';
session_start();

//fetch user id from the database by using get
if(isset($_GET['id'])){
    $user_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
} else {
    header('Location: manage-users.php');
    die();
}
?>
<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit User</h2>

        <form action="add-user-data.php" method="POST">
            <input type="text" value="<?= $user['first_name']?>"name="firstname"placeholder="First Name">
            <input type="text" value="<?= $user['last_name']?>" name= "lastname"placeholder="Last Name">
            <label for="user_role">User Role</label>
            <select name= "role" id="role">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            
            <button type="submit" name="submit" class="btn">Update User</button>
                
            
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>