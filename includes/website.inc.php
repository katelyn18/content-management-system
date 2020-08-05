<?php
session_start();
if( isset( $_POST[ 'website-submit' ] ) ){
    require "dbh.inc.php";
     //get info
     $user_id = $_SESSION[ 'user_id' ];
     $website_name = $_POST[ "website-name" ];

     //error handling
     if( empty( $website_name ) ){
         header("Location: ../dash.php?error=emptyfields" );
         exit();
     } else{
         //check if website name already exists
         $sql = "SELECT websiteName FROM Website WHERE websiteName=?"; /**** need to add userId in the where clause */
         $stmt = mysqli_stmt_init( $conn );
         if( !mysqli_stmt_prepare( $stmt, $sql ) ){
             header( "Location: ../dash.php?error=sqlerror" );
             exit();
         }else{
             mysqli_stmt_bind_param( $stmt, "s", $website_name );
             mysqli_stmt_execute( $stmt );
             mysqli_stmt_store_result( $stmt );
             //check result
            $resultCheck = mysqli_stmt_num_rows( $stmt );
            if( $resultCheck > 0 ){
                header( "Location: ../dash.php?error=websitenametaken" );
                exit();
            }else{ //insert new website name
                $sql = "INSERT INTO Website( websiteName, userId ) VALUES( ?, ? )";
                $stmt = mysqli_stmt_init( $conn );
                if( !mysqli_stmt_prepare( $stmt, $sql ) ){
                    header( "Location: ../dash.php?error=sqlerror" );
                    exit();
                } else{
                    mysqli_stmt_bind_param( $stmt, "si", $website_name, $user_id);
                    mysqli_stmt_execute( $stmt );
                    header( "Location: ../dash.php?websitecreation=success" );
                    exit();
                }
            }
         }

     }

     mysqli_stmt_close( $stmt );
     mysqli_close( $conn );
} else{
    header("Location: ../dash.php" );
    exit();
}