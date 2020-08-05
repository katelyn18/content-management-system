<?php
    require "header.php";
?>
<main>
    <?php   
        if( isset( $_SESSION[ 'userUid' ] ) ){
            echo "<a href='dash.php'>Dashboard</a>";

        }else{
            echo "<p>You are logged out! </p>";
        }
    ?> 
    
    <h1 class="home-page">Welcome!</h1>
    <p class="home-page">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac rhoncus neque. In at dictum urna. Vestibulum tristique blandit nisl, a pretium massa ultricies a. Praesent ultrices congue elit sed aliquam. Duis dictum at tellus eu aliquam. Fusce et aliquet nisi. Donec egestas turpis sed suscipit eleifend. Etiam venenatis id diam eget sollicitudin. Suspendisse vestibulum nulla dui, quis egestas ante ornare nec. Aliquam sed placerat quam. Aenean porta mauris odio, ornare congue turpis sagittis vel. Etiam molestie viverra ligula ut lacinia. Nulla facilisi. Mauris urna odio, convallis sit amet odio at, auctor cursus turpis.</p>

    <p class="home-page">Donec elementum mauris velit, in dapibus tellus cursus eget. Aliquam egestas purus lorem, sed viverra mauris sollicitudin ac. Etiam pellentesque eros justo, eu tincidunt lectus ultrices at. Praesent blandit lectus non leo tempus, non commodo tellus vehicula. Aliquam ex ipsum, porttitor ac ipsum sit amet, posuere finibus neque. Mauris tempus, justo in fringilla hendrerit, ipsum nulla sodales dolor, id tempus nulla ante eget ipsum. Nullam posuere ex nibh, et cursus erat molestie ac. Pellentesque in eros at lectus finibus gravida. Fusce felis turpis, feugiat non urna non, luctus suscipit purus. Etiam vehicula pharetra justo, nec luctus nulla consectetur at. Praesent varius ante ligula, at ultricies odio tempus ac.</p>

</main>
<?php
    require "footer.php";
?>