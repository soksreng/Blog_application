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
            <h2>Sign Up</h2>
            <?php if (isset($_SESSION['signup'])) : ?>
                <div class="alert_message error">
                    <p><?= $_SESSION['signup'] ;
                        unset($_SESSION['signup']);  ?>
                    </p> 
                </div>

            <?php endif ?>
                    
            <form action="signup-data.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="firstname" placeholder="First Name" required>
                <input type="text" name ="lastname" placeholder="Last Name" required>
                <input type="text" name ="username" placeholder="Username" required>
                <input type="Email" name ="email" placeholder="Email" required>
                <input type="Password" name ="password" placeholder="Password (must be at least 8 characters)" required >
                <input type="Password" name ="confirmpassword" placeholder="Confirm Password" required>
                <div class="form_control">
                    <label for="avatar">User Profile</label>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                    <button type="submit" name = "submit" class="btn">Sign Up</button>
                    <small>Already have an account? <a href="signin.php">Sign in</a></small>
                </div>
            </form>
        </div>
    </section>
</body>
</html>