<?php
include 'partial/header.php';

//fetech featured posts from database
$featured_sql = "SELECT * FROM post WHERE is_featured = 1";
$featured_result = mysqli_query($conn, $featured_sql);
$featured = mysqli_fetch_assoc($featured_result);

//fetech posts from database
$posts_sql = "SELECT * FROM post ORDER BY date_time DESC";

$posts_result = mysqli_query($conn, $posts_sql);

?>

<section class="search_bar">
    <form class="container search_bar-container" action="">
        <div class="">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" name="search" id="search" placeholder="Search">
        </div>
        <button type = "submit" class="btn">Go</button>
    </form>
</section>
<section class="posts <?=$featured? '' : 'section_extra-margin'?>">
    <div class="container posts_container">
        <!--loop throuhg the posts-->
        <?php while($post = mysqli_fetch_assoc($posts_result)):?>
            <article class="post">
                <div class="post_thumbnail">
                    <img src="./images/<?=$post['thumbnail']?>">
                </div>
                <div class="post_info">
                    <!--fetch category from the database-->
                    <?php
                        $category_id = $post['category_id'];
                        $category_sql = "SELECT * FROM category WHERE id = $category_id";
                        $category_result = mysqli_query($conn, $category_sql);
                        $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="category-post.php?id=<?=$post['category_id']?>" class="category_button"><?=$category['title']?></a>
                    <h3 class="post_title">
                        <a href="post.php?id<?=$post['id']?>"></a>
                        <?=$post['title']?>
                    </h3>
                    
                    <p class="post_body">
                        <?=substr($post['body'], 0, 200)?>...
                    </p>

                    <div class="post_author">
                        <!--fetch user from the database-->
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
                            <h5>
                                by: <?= "{$author['first_name']} {$author['last_name']}"?>
                            </h5>
                            <small>
                                <?=date("M d, Y - H:i", strtotime($post['date_time']))?>
                            </small>
                    </div>
                </div>
            </article>
        <?php endwhile;?>

    </div>
</section>

<!--End Posts-->

<section class="category_buttons">
    <div class="container category_buttons-container">
        <?php
            $sql = "SELECT * FROM category";
            $result = mysqli_query($conn, $sql);
            while($category = mysqli_fetch_assoc($result)) :?>
                <a href="category-post.php?id=<?= $category['id']?>" class="category_button"><?=$category['title']?></a>
                <?php endwhile;
        ?>
    </div>
</section>


<?php
include "partial/footer.php";
?>
