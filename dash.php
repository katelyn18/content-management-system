<?php
    require "header.php";
    require "includes/dbh.inc.php";
?>
<main>
    <?php
        echo "<h1 class='dash-title'>Welcome " . $_SESSION[ 'userUid' ]. "</h1>";
    ?>
    <div class="sidebar">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Create Website</button> <br>
        <button type="button">Setting</button> <br>
        <button type="button">Help</button> <br>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Create a Website</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="includes/website.inc.php" method="post">
        <div class="modal-body">
            
                <label for="website-name">Website Name: </label>
                <input type="text" id="website-name" name="website-name" placeholder="Website Name">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="website-submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- List of websites created -->
    <div>
        <?php
            $user_name = $_SESSION[ 'userUid' ];
            echo "<p>user_name: " . $user_name . "</p>";
            $sql = "SELECT websiteName FROM Website INNER JOIN Users ON Website.userId=Users.userId WHERE Users.userName=?";    /* ERROR HERE */
            $stmt = mysqli_stmt_init( $conn );
            if( !mysqli_stmt_prepare( $stmt, $sql ) ){
                header("Location: ../dash.php?error=sqlwebsiteerror" );
                exit();
            }else{
                mysqli_stmt_bind_param( $stmt, "s", $user_name );
                mysqli_stmt_execute( $stmt );
                mysqli_stmt_store_result( $stmt );
                $resultCheck = mysqli_stmt_num_rows( $stmt );
                if( $resultCheck > 0 ){
                    if( $results = mysqli_query( $conn, $sql ) ){
                        while( $row = mysqli_fetch_row( $results ) ){ 
                            echo "<p>" . $row[0] . "</p>";
                        }
                        mysqli_free_result( $results );
                    } else{
                        echo "Error: " . mysqli_error( $conn );
                    }
                }else{
                    echo "<p>No websites created yet</p>";
                }
            }

            mysqli_stmt_close( $stmt );
            mysqli_close( $conn );
        ?>
    </div>

</main>
<?php
    require "footer.php";
?>