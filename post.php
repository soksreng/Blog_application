<?php
include 'partial/header.php';

//fetch post from the database
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM post WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);

    //fetech author information
    $author_id = $post['author_id'];
    $sql_author = "SELECT * FROM users WHERE id = $author_id";
    $result_author = mysqli_query($conn, $sql_author);
    $author = mysqli_fetch_assoc($result_author);
} else {
    header('Location: index.php');
    die();
} 
?>


<section class="singlepost">
    <div class="container singlepost_container section_extra-margin">
        <h2><?= $post['title']?></h2>

        <div class="post_author">
            <div class="post_author_avatar">
                <img src="./images/<?= $author['avatar']?>" >
            </div>
            <div class="post_author-info">
                <h5>By: <?= "{$author['first_name']} {$author['last_name']}" ?></h5>
                <small>
                    <?=date("M d, Y - H:i", strtotime($post['date_time']))?>
                </small>
            </div>
        </div>
        <div class="singlepost_thumbnail">
            <img src="./images/<?=$post['thumbnail']?>">
        </div>

        <p>
            <?= $post['body']?>
        </p>

        
    </div>
</section>

<!--End SINGLEPOST-->



<?php
include "partial/footer.php";
?>
