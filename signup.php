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
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign Up</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
                <input type="text" placeholder="Username">
                <input type="Email" placeholder="Email">
                <input type="Password" placeholder="Password">
                <input type="Password" placeholder="Confirm Password">
                <div class="form_control">
                    <label for="avatar">User Profile</label>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                    <button type="submit" class="btn">Sign Up</button>
                    <small>Already have an account? <a href="signin.html">Sign in</a></small>
                </div>
            </form>
        </div>
    </section>
</body>
</html>