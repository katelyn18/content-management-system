<?php
if( isset( $_POST[ 'login-submit' ] ) ){
    require "dbh.inc.php";

    $mailuid = $_POST[ "mailuid" ];
    $password = $_POST[ "pwd" ];

    if( empty( $mailuid ) || empty( $password ) ){
        header( "Location: ../index.php?error=emptyfields" );
        exit();
    }else{
        $sql = "SELECT * FROM Users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init( $conn );
        if( !mysqli_stmt_prepare( $stmt, $sql ) ){
            header( "Location: ../index.php?error=sqlerror" );
            exit();
        }else{
            mysqli_stmt_bind_param( $stmt, "ss", $mailuid, $mailuid ); //cuz checking username OR email
            mysqli_stmt_execute( $stmt );
            $result = mysqli_stmt_get_result( $stmt );

            if( $row = mysqli_fetch_assoc( $result ) ){
                $pwdCheck = password_verify( $password, $row[ 'pwd' ] ); //true or false
                if( $pwdCheck == false ){
                    header( "Location: ../index.php?error=wrongpassword" );
                    exit();
                }else if( $pwdCheck == true ){
                    session_start();
                    $_SESSION[ 'user_id' ] = $row[ 'userId' ];
                    $_SESSION[ 'userUid' ] = $row[ 'username' ];

                    header( "Location: ../dash.php" );
                    exit();
                }else{  //on the off chance pwdCheck isn't true or false
                    header( "Location: ../index.php?error=wrongpassword" );
                    exit();
                }
            }else{
                header( "Location: ../index.php?error=nouser" );
                exit();
            }
        }
    }

}else{
    header( "Location: ../index.php" );
    exit();
}