<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>Content Management System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css?<?php echo time(); ?>"> <!-- php added to not upload css from cache -->
        <link rel="icon" type="image/png" href="img/favicon.png">
    </head>
    <body>
        <nav>
            <a class="logo" href="index.php">
                <img src="img/logo.png" alt="logo/home"> <!-- makes website look professional -->
            </a>
            <div class="loginout">
                <?php
                    if( isset( $_SESSION[ 'userUid' ] ) ){ /* CHANGE userUid !!!!!!!!!!!! */
                        echo '<form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>';
                    }else{
                        echo '<form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/Email">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="changePassword.php">Change Password</a>
                    <a href="signup.php">Signup</a>';
                    }
                ?>
            </div>
        </nav>
    
