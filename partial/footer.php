<php 
?>

<footer>
        <div class="footer_socials">
            <a href="" target="_blank"> 
                <i class="fa-brands fa-youtube"></i></a>
            <a href="" target="_blank"> <i class="fa-brands fa-facebook"></i></a>
            <a href="" target="_blank"><i class="fa-brands fa-linkedin"></i> </a>
            <a href="" target="_blank"><i class="fa-brands fa-square-instagram"></i> </a>
            <a href="" target="_blank"><i class="fa-brands fa-twitter"></i> </a>
        </div>

        <div class="container footer_container">
            <article>
                <h4>Category</h4>
                <!-- fetech category -->

                <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql);
                    while($category = mysqli_fetch_assoc($result)) :?>
                    <ul>
                        <li>
                            <a href="category-post.php?id=<?= $category['id']?>" ><?=$category['title']?></a>
                        </li>
                    </ul>
                <?php endwhile;
                ?>
            </article>

            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online Support</a></li>
                    <li><a href="">Call Number</a></li>
                    <li><a href="">Emails</a></li>
                    <li><a href="">Social Support</a></li>
                    <li><a href="">Location</a></li>
                    
                </ul>
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">Popular</a></li>
                    <li><a href="">Categories</a></li>
                    
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">Contact</a></li>
                    
                </ul>
            </article>
        </div>

        <div class="footer_copyright">
            <small>Copyright &copy; Sok Sreng CHAN</small>
        </div>
    </footer>

    <script src="<?= ROOT_URL ?>./js/main.js"></script>
</body>

</html>