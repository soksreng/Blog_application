<?php

include 'partial/header.php';
//fetech featured post from the database
$featured_sql = "SELECT * FROM post WHERE is_featured = 1";
$featured_result = mysqli_query($conn, $featured_sql);
$featured_post = mysqli_fetch_assoc($featured_result);

//fetech post from the database

$post_sql = "SELECT * FROM post WHERE is_featured = 0  ORDER BY date_time DESC LIMIT 12";
$post_result = mysqli_query($conn, $post_sql);


?>

<?php  if (mysqli_num_rows($featured_result) == 1 ) : ?>
    <section class="featured">
        <div class="container featured_container">
            <div class="post_thumbnail">
                <img src="./images/<?= $featured_post['thumbnail'] ?>">
            </div>
            <div class="post_info">
                <!--fetech categorie from the database -->
                <?php
                    $category_id = $featured_post['category_id'];
                    $sql = "SELECT * FROM category WHERE id = $category_id";
                    $result = mysqli_query($conn, $sql);
                    $category = mysqli_fetch_assoc($result);
                    
                ?> 
                
                <a href="category-post.php" class="category_button"><?=$category['title']?></a>
                <h2 class="post_title"> 
                    <a href="post.php?id=<?=$featured_post['id']?>"><?= $featured_post['title'] ?> </a>
                </h2>
                <p class="post_body" >
                    <?= substr($featured_post['body'], 0, 200) ?>...
                </p>
                <!-- fetch user from the database -->
                <div class="post_author">
                    <?php
                        $author_id = $featured_post['author_id'];
                        $sql = "SELECT * FROM users WHERE id = $author_id";
                        $result = mysqli_query($conn, $sql);
                        $author = mysqli_fetch_assoc($result);
                    ?>
                    <div class="post_author_avatar">
                        <img src="./images/<?=$author['avatar']?>">
                    </div>
                    <div class="post_author-info">
                        <h5><?= "{$author['first_name']} {$author['last_name']}"?></h5>
                        <small>
                            <?=date("M d, Y - H:i", strtotime($featured_post['date_time']))?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>

<!--End Feature-->

<?php if(mysqli_num_rows($post_result) > 0) : ?>
<section class="posts">
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
                        $sql = "SELECT * FROM category WHERE id = $category_id";
                        $result = mysqli_query($conn, $sql);
                        $category = mysqli_fetch_assoc($result);
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
                            $sql = "SELECT * FROM users WHERE id = $author_id";
                            $result = mysqli_query($conn, $sql);
                            $author = mysqli_fetch_assoc($result);
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
