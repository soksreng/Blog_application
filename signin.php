<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/24593fac0b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign in</h2>
            <!--show success message-->
            <?php if (isset($_SESSION['signup_success'])) : ?>
                <div class="alert_message success">
                    <p><?= $_SESSION['signup_success'] ;
                        unset($_SESSION['signup_success']);  ?>
                    </p> 
                </div>

            <!--show error message-->
            <?php elseif (isset($_SESSION['signin_error'])) : ?>
                <div class="alert_message error">
                    <p><?= $_SESSION['signin_error']; 
                            unset($_SESSION['signin_error']); ?> 
                    </p> 
                </div>

            <?php elseif (isset($_SESSION['add-category_error'])) : ?>
                <div class="alert_message error">
                    <p><?= $_SESSION['add-category_error']; 
                            unset($_SESSION['add-category_error']); ?> 
                    </p> 
                </div>
            <?php endif; ?>
            <form action="signin-data.php" method="POST">
                <input type="text" name="user_input" placeholder="Username or Email">
                <input type="Password" name="password" placeholder="Password">
                <div class="form_control">
                <button type="submit" class="btn" name="submit">Sign in</button>
                <small>Don't have an account? <a href="signup.php">Sign up</a></small>
            </form>
        </div>
    </section>
</body>
</html>