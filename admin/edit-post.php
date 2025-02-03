<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/24593fac0b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <nav>
        <div class="container nav_container">
            <a href="index.html" class="nav_logo">Jackkenas</a>
            <ul class="nav_items">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="signin.html">Sign in</a></li>
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="/images/avatar.png" alt="">
                    </div>

                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>
                
            </ul>

            <button id="open_nav-btn"><i class="fa-solid fa-bars"></i></button>
            <button id="close_nav-btn"><i class="fa-solid fa-x"></i></button>
        </div>
    </nav>

    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Post</h2>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="Title">

                <select name="" id="">
                    <option value="1">Travel</option>
                    <option value="1">Art</option>
                    <option value="1">Science & Techonology</option>
                    <option value="1">T</option>
                    <option value="1">Travel</option>
                    <option value="1">Travel</option>
                </select>

                <textarea rows = "10"  placeholder="Body"></textarea>
                <div class="form_control inline">
                    <input type="checkbox" id="is_featured" name="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div>

                <div class="form_control">
                    <label for="thumbnail"> Update Thumnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/png, image/jpeg">
                </div>
                <button type="submit" class="addcat_button">Update Post</button>
            </form>
        </div>
    </section>

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
                <ul>
                    <li><a href="">Art</a></li>
                    <li><a href="">Wild life</a></li>
                    <li><a href="">Travel</a></li>
                    <li><a href="">Science & Technology</a></li>
                    <li><a href="">Food</a></li>
                    <li><a href="">Music</a></li>
                </ul>
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
    <script src="main.js"></script>
</body>
</html>