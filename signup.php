<?php
    require "header.php";
?>
<main>
    <div class="signup-container">
        <section>
            <h1>Signup</h1>
            <?php
                if( isset( $_GET[ 'error' ] ) ){
                    if( $_GET[ 'error' ] == "emptyfields" ){
                        echo "<p>Fill in all fields!</p>";
                    }else if( $_GET[ 'error' ] == "invaliduidmail"){
                        echo "<p>invalid username and email!</p>";
                    }else if(  $_GET[ 'error' ] == "invalidmail" ){
                        echo "<p>invalid email!</p>";
                    }else if(  $_GET[ 'success' ] == "invalidusername" ){
                        echo "<p>invalid username!</p>";
                    }else if(  $_GET[ 'error' ] == "passwordcheck" ){
                        echo "<p>Passwords don't match!</p>";
                    }else if(  $_GET[ 'error' ] == "sqlerror" ){
                        echo "<p>SQL went wrong</p>";
                    }else if(  $_GET[ 'error' ] == "usernametaken" ){
                        echo "<p>Username taken</p>";
                    }else if(  $_GET[ 'signup' ] == "success" ){
                        echo "<p>Signup successful</p>";
                    }
                }
            ?>
            <form action="includes/signup.inc.php" method="post" class="signup">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section>
    </div>
</main>
<?php
    require "footer.php";
?>