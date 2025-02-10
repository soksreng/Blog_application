<?php
include 'partial/header.php';

//fetch categories from the posts database
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM post WHERE category_id = $id ORDER BY date_time DESC";
    $posts = mysqli_query($conn, $sql);
} else {
    header('Location: blog.php');
    die();
}
?>


<header class="category_title">
    <!--fetech Category title-->
    <?php
        $category_sql = "SELECT * FROM category WHERE id = $id";
        $category_result = mysqli_query($conn, $category_sql);
        $category = mysqli_fetch_assoc($category_result);
    ?>

    <h2><?=$category['title']?></h2>
</header>

<!--End Category title-->
<?php if (mysqli_num_rows($posts) > 0) : ?>
    <section class="posts">
        <div class="container posts_container">
            <!-- loop through the list of posts -->
             <?php while ($post = mysqli_fetch_assoc($posts) ) : ?>
                <article class="post">
                    <div class="post_thumbnail">
                        <img src="./images/<?=$post['thumbnail']?>">
                    </div>
                    <div class="post_info">
                        <!--fetech categorie from the database -->
                        <?php
                            $category_id = $post['category_id'];
                            $sql = "SELECT * FROM category WHERE id = $category_id";
                            $result = mysqli_query($conn, $sql);
                            $category = mysqli_fetch_assoc($result);
                        ?> 
                        
                        <a href="category-post.php" class="category_button"><?=$category['title']?></a>
                        <h2 class="post_title"> 
                            <a href="post.php?id=<?=$post['id']?>"><?= $post['title'] ?> </a> 
                        </h2>
                        
                        <p class="post_body" >
                            <?= substr($post['body'], 0, 200)?>...
                        </p>
                        
                        <div class="post_author">
                        <!-- fetch user from the database -->
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
                            <h5>by:<?="{$author['first_name']} {$author['last_name']}"?></h5>
                            <small>
                                <?= date('M d, Y - H:i', strtotime($post['date_time'])) ?>
                            </small>
                    </div>
                </div>
            </article>
            <?php endwhile;?>


        </div>
    </section>
<?php else : ?>
    <div class="alert_message error">
        <p>No post found in this category</p>
    </div>
    <?php endif;?>


<!--End Posts-->

<section class="category_buttons">
    <div class="container category_buttons-container">

        <!--fetech all categories -->
        <?php
            $sql = "SELECT * FROM category";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) :?>
                <a href="category.php?id=<?=$row['id']?>" class="category_button"><?=$row['title']?></a>
        <?php endwhile?>
   
    </div>
</section>


<?php
include "partial/footer.php";
?>
