<?php

if( isset( $_POST[ 'signup-submit' ] ) ){
    require "dbh.inc.php";

    //get info from sign up form
    $username = $_POST[ 'uid' ];
    $email = $_POST[ 'mail' ];
    $password = $_POST[ 'pwd' ];
    $passwordRepeat = $_POST[ 'pwd-repeat' ];

    //error handling
    //check if a field is empty
    if( empty( $username ) || empty( $email ) || empty( $password ) || empty( $passwordRepeat ) ){
        header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email); 
        exit(); 
    }else if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) && !preg_match( "/^[a-zA-Z0-9]*$/", $username ) ){
        //checks if username AND email is incorrect
        header("Location: ../signup.php?error=invaliduidmail"); 
        exit(); 
    }else if( !filter_var( $email, FILTER_VALIDATE_EMAIL )){ 
        //check if user used a valid email
        header("Location: ../signup.php?error=invalidmail&uid=" . $username );
        exit();
    }else if( !preg_match( "/^[a-zA-Z0-9]*$/", $username )){
        //check if user used a valid username
        header("Location: ../signup.php?error=invalidusername&mail=" . $email); 
        exit();
    }else if( $password !== $passwordRepeat ){
        //checks if passwords match each other
        header("Location: ../signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email); 
        exit(); 
    }else{
        //checks if username already exists in the database
        $sql = "SELECT username FROM Users WHERE username=?";
        $stmt = mysqli_stmt_init( $conn );
        if( !mysqli_stmt_prepare( $stmt, $sql ) ){
            header("Location: ../signup.php?error=sqlerror"); 
            exit();
        }else{
            //s = string, b = boolean, i = int, d = double
            //number of characters = how many inserts
            mysqli_stmt_bind_param( $stmt, "s", $username );
            mysqli_stmt_execute( $stmt );
            mysqli_stmt_store_result( $stmt ); //gets result from database
            //how many results in stmt
            $resultCheck = mysqli_stmt_num_rows( $stmt );
            if( $resultCheck > 0 ){
                //username already in use
                header("Location: ../signup.php?error=usernametaken&mail" . $email ); 
                exit();
            }else{ //insert new user
                $sql = "INSERT INTO Users( username, email, pwd ) VALUES(?, ?, ?)";
                $stmt = mysqli_stmt_init( $conn );
                if( !mysqli_stmt_prepare( $stmt, $sql ) ){
                    header("Location: ../signup.php?error=sqlerror"); 
                    exit();
                }else{
                    $hashedPwd = password_hash( $password, PASSWORD_DEFAULT);
                
                    mysqli_stmt_bind_param( $stmt, "sss", $username, $email, $hashedPwd );
                    mysqli_stmt_execute( $stmt );
                    header("Location: ../signup.php?signup=success"); 
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close( $stmt );
    mysqli_close( $conn );

}else{
    header("Location: ../signup.php"); 
    exit();
}
