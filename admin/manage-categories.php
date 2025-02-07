<?php
include 'partial/header.php';

if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}

//fetch data from the database

$sql = "SELECT * FROM category ORDER BY title";

$result = mysqli_query($conn, $sql);
?>

<section class="dashboard">

    <?php if(isset($_SESSION['add-category_success'])) : ?>
        <div class="alert_message success">
            <p><?= $_SESSION['add-category_success']; 
                unset($_SESSION['add-category_success']) ?>
            </p> 
        </div>
    <?php elseif(isset($_SESSION['add-category_error'])) : ?>
        <div class="alert_messsage error">
            <p><?= $_SESSION['add-category_error']; 
                unset($_SESSION['add-category_error']) ?>
            </p> 
        </div>
    <?php elseif(isset($_SESSION['update_category_error'])) :?>
        <div class="alert_message error">
            <p><?= $_SESSION['update_category_error'];
                unset($_SESSION['update_category_error']) ?>
            </p>
        </div>
    <?php elseif(isset($_SESSION['update_category_success'])) :?>
        <div class="alert_message success">
            <p><?= $_SESSION['update_category_success'];
                unset($_SESSION['update_category_success']) ?>
            </p>
        </div>
    <?php elseif(isset($_SESSION['delete_category_success'])) :?>
        <div class="alert_message success">
            <p><?= $_SESSION['delete_category_success'];
                unset($_SESSION['delete_category_success']) ?>
            </p>
        </div>
    <?php elseif(isset($_SESSION['delete_category_error'])) :?>
        <div class="alert_message error">
            <p><?= $_SESSION['delete_category_error'];
                unset($_SESSION['delete_category_error']) ?>
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
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                    <li><a href="add-user.php"><i class="fa-solid fa-user"></i><h5>Add User</h5></a></li>
                    <li><a href="manage-users.php"><i class="fa-solid fa-user-pen"></i><h5>Manage User</h5></a></li>
                    <li><a href="add-category.php"><i class="fa-regular fa-pen-to-square"></i><h5>Add Category</h5></a></li>
                    <li><a href="manage-categories.php" class ="active"><i class="fa-solid fa-list"></i><h5>Manage Categories</h5></a></li>
                <?php endif;?>
            </ul>
        </aside>

        <main>
            <h2>Manage Categories</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!--loop through the list of categories-->
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $row['title'] ?></td>
                            <td><a href="edit-category.php?id=<?= $row['id'] ?>" class= "btn sm">Edit</a></td>
                            <td><a href="delete-category.php?id=<?= $row['id'] ?>" class= "btn sm delete">Delete</a></td>
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