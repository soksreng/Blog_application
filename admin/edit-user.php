<?php
include 'partial/header.php';;

//fetch user id from the database by using get
if(isset($_GET['id'])){
    $_SESSION ['user_id'] = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

} 
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    $_SESSION['update_user_error'] = "Error: user ID is missing.";
    header('Location: manage-users.php');
    die();
}

//fetch user data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<section class="form_section">
    <div class="container form_section-container">
        <?php  if(isset($_SESSION['update_user_error'])): ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['update_user_error'];
                    unset($_SESSION['update_user_error']); ?>
                </p>
            </div>
        <?php endif; ?>

        <h2>Edit User</h2>

        <form action="edit-user-data.php" method="POST">
            <input type="hidden" name="id" value="<?= $user_id ?>">
            <input type="text" value="<?= $user['first_name']?>"name="firstname"placeholder="First Name">
            <input type="text" value="<?= $user['last_name']?>" name="lastname"placeholder="Last Name">
            <label for="user_role">User Role</label>
            <select name="role">
                <option value="0" <?= $user['is_admin'] == 0 ? 'selected' : '' ?>>Author</option>
                <option value="1" <?= $user['is_admin'] == 1 ? 'selected' : '' ?>>Admin</option>
            </select>
            
            <button type="submit" name="submit" class="btn">Update User</button>
                
            
        </form>
    </div>
</section>

<?php
include '../partial/footer.php';
?>