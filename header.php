<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initiatl-scale=1">
        <title>Content Management System</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <nav>
            <a href="#">
                <img src="" alt="logo"> <!-- makes website look professional -->
            </a>
            <div>
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
                    <a href="signup.php">Signup</a>';
                    }
                ?>
            </div>
        </nav>
    
