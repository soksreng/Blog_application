<?php

require '../config/database.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <script src="https://kit.fontawesome.com/24593fac0b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!--NAV-->>
    <nav>
        <div class="container nav_container">
            <a href="<?= ROOT_URL ?>index.php" class="nav_logo">Jackkenas</a>
            <ul class="nav_items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                <!--if user is not logged in-->
                <?php if (!isset($_SESSION['user_id'])) : ?>
                    <!--show sign in button if the user is not logged in -->
                    <li><a href="<?= ROOT_URL ?>signin.php">Sign in</a></li>
                <?php endif; ?>
                <!--if user is logged in-->
                <?php if (isset($_SESSION['user_id'])) : ?>
                <li class="nav_profile">
                    <div class="avatar">
                    <img src=" <?= ROOT_URL. 'images/' . ($_SESSION['avatar']) ?>">
                    </div>

                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/dashboard.php">Dashboard</a></li>
                        <!--show the logout button if the user is logged in-->
                        <li><a href="<?= ROOT_URL?>logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php endif;?>
                
            </ul>

            <button id="open_nav-btn"><i class="fa-solid fa-bars"></i></button>
            <button id="close_nav-btn"><i class="fa-solid fa-x"></i></button>
        </div>
    </nav>
    <!--END NAV-->