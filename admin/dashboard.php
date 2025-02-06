<?php
include 'partial/header.php';
session_start();
?>

<section class="dashboard">
       <!--show success message if add post successfully-->
    <?php if (isset($_SESSION['add_post_success'])): ?>
        <div class="alert_message success">
            <p>
                <?= $_SESSION['add_post_success'];
                unset($_SESSION['add_post_success']); ?>
            </p>
        </div>
    <?php endif; ?>
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
                <li><a href="dashboard.php" class ="active"><i class="fa-solid fa-pen-to-square"></i><h5>Manage Post</h5></a></li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                    <li><a href="add-user.php"><i class="fa-solid fa-user"></i><h5>Add User</h5></a></li>
                    <li><a href="manage-users.php" ><i class="fa-solid fa-user-pen"></i><h5>Manage User</h5></a></li>
                    <li><a href="add-category.php"><i class="fa-regular fa-pen-to-square"></i><h5>Add Category</h5></a></li>
                    <li><a href="manage-categories.php" ><i class="fa-solid fa-list"></i><h5>Manage Categories</h5></a></li>
                <?php endif;?>
            </ul>
        </aside>

        <main>
               <!--show success message if add post successfully-->
            <?php if (isset($_SESSION['add_post_success'])): ?>
                <div class="alert_message success">
                    <p>
                        <?= $_SESSION['add_post_success'];
                        unset($_SESSION['add_post_success']); ?>
                    </p>
                </div>
            <?php endif; ?>
            <h2>Manage Posts</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>asdasadsas dassasasda sadsasdadsa</td>
                        <td>Wildlife</td>
                        <td><a href=" <?= ROOT_URL ?>edit-post.html" class= "btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>delete-category.html" class= "btn sm delete">Delete</a></td>
                    </tr>
                    <tr>
                        <td>asdasadsas dassasasda sadsasdadsa</td>
                        <td>Wildlife</td>
                        <td><a href="edit-post.html" class= "btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class= "btn sm delete">Delete</a></td>
                    </tr>
                    <tr>
                        <td>asdasadsas dassasasda sadsasdadsa</td>
                        <td>Wildlife</td>
                        <td><a href="edit-post.html" class= "btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class= "btn sm delete">Delete</a></td>
                    </tr>

                        
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php
include '../partial/footer.php';
?>
