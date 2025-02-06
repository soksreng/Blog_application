<?php
include 'partial/header.php';

//fetch data from the database 
$current_user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE not id = '$user_id'";

$result = mysqli_query($conn, $sql);

?>

<section class="dashboard">
    <!--if the add user is successful-->
    <?php  if(isset($_SESSION['add-user_success'])): ?>
        <div class="alert_message success">
            <p>
                <?= $_SESSION['add-user_success'];
                unset($_SESSION['add-user_success']); ?>
            </p>
        </div>
    <!-- if the add user is unsuccessful -->
    <?php  elseif(isset($_SESSION['add-user'])): ?>
        <div class="alert_message error">
            <p>
                <?= $_SESSION['add-user'];
                unset($_SESSION['add-user']); ?>
            </p>
        </div>

    <!-- if the update is unsuccessful -->
    <?php elseif(isset($_SESSION['update_error'])): ?>
        <div class="alert_message error">
            <p>
                <?= $_SESSION['update_error'];
                unset($_SESSION['update_error']); ?>
            </p>
        </div>
    <!-- if the update is successful -->
    <?php elseif(isset($_SESSION['update_success'])): ?>
        <div class="alert_message success">
            <p>
                <?= $_SESSION['update_success'];
                unset($_SESSION['update_success']); ?>
            </p>
        </div>
        <!-- if the delete is successful -->
    <?php elseif(isset($_SESSION['delete_success'])): ?>
        <div class="alert_message success">
            <p>
                <?= $_SESSION['delete_success'];
                unset($_SESSION['delete_success']); ?>
            </p>
        </div>
        <!-- if the delete is unsuccessful -->
    <?php elseif(isset($_SESSION['delete_error'])): ?>
        <div class="alert_message error">
            <p>
                <?= $_SESSION['delete_error'];
                unset($_SESSION['delete_error']); ?>
            </p>
        </div>
    <?php endif ?>
    
    
    <div class="container dashboard_container">

        <button class="sidebar_toggle" id="show_sidebar-btn">                
            <i class="fa-solid fa-right-long"></i>
        </button>
        <button class="sidebar_toggle" id="hide_sidebar-btn">                
            <i class="fa-solid fa-left-long"></i>
        </button>

        <aside>
            <ul>
                <li><a href="add-post.php"><i class="fa-solid fa-pen-nib"></i><h5>Add Post</h5></a></li>
                <li><a href="dashboard.php"><i class="fa-solid fa-pen-to-square"></i><h5>Manage Post</h5></a></li>
                <li><a href="add-user.php"><i class="fa-solid fa-user"></i><h5>Add User</h5></a></li>
                <li><a href="manage-users.php" class ="active"><i class="fa-solid fa-user-pen"></i><h5>Manage User</h5></a></li>
                <li><a href="add-category.php"><i class="fa-regular fa-pen-to-square"></i><h5>Add Category</h5></a></li>
                <li><a href="manage-categories.php" ><i class="fa-solid fa-list"></i><h5>Manage Categories</h5></a></li>
            </ul>
        </aside>

        <main>
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <!--loop through the list of users-->
                    <?php while($row = mysqli_fetch_assoc($result)):?>
                        <tr>
                            <td><?= "{$row['first_name']} {$row['last_name']}" ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><a href="edit-user.php?id=<?= $row['id'] ?>" class= "btn sm">Edit</a></td>
                            <td><a href="delete-user.php?id=<?= $row['id'] ?>" class= "btn sm delete">Delete</a></td>
                            <td><?= $row['is_admin'] == 1 ? 'YES' : 'NO' ?></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php
include '../partial/footer.php';
?>