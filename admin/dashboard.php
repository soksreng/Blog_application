<?php
include 'partial/header.php';

// fetech post data from the database
$current_user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM post WHERE author_id = $current_user_id";

$result = mysqli_query($conn, $sql);
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
        <!--show error message if add post unsuccessfully-->
        <?php elseif (isset($_SESSION['add_post_error'])): ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['add_post_error'];
                    unset($_SESSION['add_post_error']);?>
                </p>
            </div>
        </div>
        <!--show error messgage if update post successfully-->
        <?php elseif (isset($_SESSION['update_post_success'])): ?>
            <div class="alert_message success">
                <p>
                    <?= $_SESSION['update_post_success'];
                    unset($_SESSION['update_post_success']);?>
                </p>
            </div>
        </div>
        <!--show error messgage if update post unsuccessfully-->
        <?php elseif (isset($_SESSION['update_post_error'])): ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['update_post_error'];
                    unset($_SESSION['update_post_error']);?>
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
                <!--show table only if there is post data in the database -->
                <?php if (mysqli_num_rows($result) > 0) :?>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) :?>
                            <!-- fetch category name using category id from the database -->
                            <?php
                            $category_id = $row['category_id'];
                            $sql_category = "SELECT title FROM category WHERE id = $category_id";
                            $result_category = mysqli_query($conn, $sql_category);
                            $category = mysqli_fetch_assoc($result_category);?>
                            <tr>
                                <td><?=$row['title']?></td>
                                <td><?=$category['title']?></td>
                                <td><a href="edit-post.php?id=<?= $row['id']?>" class= "btn sm">Edit</a></td>
                                <td><a href="delete-post.php?id=<?= $row['id']?>" class= "btn sm delete">Delete</a></td>
                            </tr>
                        </tbody>
                    <?php endwhile;?>
                <?php else :?>
                    <div class="alert_message error">
                        <p>No post found</p>
                    </div>
                <?php endif;?>
            </table>
        </main>
    </div>
</section>

<?php
include '../partial/footer.php';
?>
