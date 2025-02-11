<?php
require 'partials/header.php';

if ((isset($_GET['search'])) && isset($_GET['submit'])){
    $search = filter_var($_GET['search'], FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM post WHERE title LIKE '%$search%' OR body LIKE '%$search%' ORDER BY date_time DESC";
    $post_result = mysqli_query($conn, $sql);
} else {
    header('Location: blog.php');
    die();
}
?>

<?php if(mysqli_num_rows($post_result) > 0) : ?>
    <section class="posts section_extra-margin">
        <div class="container posts_container">
            <!-- loop through the list of posts -->
            <?php while($post = mysqli_fetch_assoc($post_result)) :?>       
                <article class="post">
                    <div class="post_thumbnail">
                        <img src="./images/<?= $post['thumbnail'] ?>">
                    </div>
                    <div class="post_info">
                        <!-- fetch categorie from the database -->
                        <?php
                            $category_id = $post['category_id'];
                            $category_sql = "SELECT * FROM category WHERE id = $category_id";
                            $category_result = mysqli_query($conn, $category_sql);
                            $category = mysqli_fetch_assoc($category_result);
                        ?>
                        <a href="category-post.php" class="category_button"><?=$category['title']?></a>
                        <h3 class="post_title">
                            <a href="post.php?id=<?=$post['id']?>"><?= $post['title']?></a>
                        </h3>
                        
                        <p class="post_body">
                            <?= substr($post['body'], 0, 200) ?>...
                        </p>
                                        <!-- fetch user from the database -->
    
                        <div class="post_author">
                            <?php
                                $author_id = $post['author_id'];
                                $author_sql = "SELECT * FROM users WHERE id = $author_id";
                                $author_result = mysqli_query($conn, $author_sql);
                                $author = mysqli_fetch_assoc($author_result);
                            ?>
                            <div class="post_author_avatar">
                                <img src="./images/<?=$author['avatar']?>">
                            </div>
                            <div class="post_author-info">
                                <h5><?= "{$author['first_name']} {$author['last_name']}"?></h5>
                                <small>
                                    <?=date("M d, Y - H:i", strtotime($post['date_time']))?>
                                </small>
                        </div>
                    </div>
                </article>
            <?php endwhile;?>
        </div>
    </section>
    <?php else: ?>
        <div class="alert_message_error_section_extra-margin">
            <p>No post found</p>
        </div>
    
    <?php endif;?>
    
    
    <!--End Posts-->
    
    <section class="category_buttons">
        <div class="container category_buttons-container">
            <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                while($category = mysqli_fetch_assoc($result)) :?>
                    <a href="category-post.php?id=<?= $category['id']?>" class="category_button"><?=$category['title']?></a>
                    <?php endwhile;?>
        </div>
    
    </section>
    
    
    
    <?php
    include "partial/footer.php";
    ?>
    