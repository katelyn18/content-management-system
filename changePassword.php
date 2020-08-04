<?php
    require "header.php";
?>
<main>
    <div class="format-container">
        <h1>Change Password</h1>
        <form action="database/signup.db.php" method="post" class="signup">
                <input type="text" name="mail" placeholder="Email">
                <button type="submit" name="change-password-submit">Submit</button>
        </form>
    </div>

</main>
<?php
    require "footer.php";
?>