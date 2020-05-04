<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
include "connect.php";
include "user.php";

if(isset($_POST['submit'])) //if session is set
{

    $users_login_name = filter_input(INPUT_POST, 'users_name', FILTER_SANITIZE_STRING); // user name
    $users_login_password = filter_input(INPUT_POST, 'users_password', FILTER_SANITIZE_STRING); // user password

    //check to see if user and password match in database
    $command2 = "SELECT * FROM users WHERE users_name = ? AND users_password = ?"; //selecting user and password where they match in database
    $stmt = $dbh->prepare($command2); //prepares command
    $params = [$users_login_name, $users_login_password]; //sets the login and password in paramaters
    $stmt->execute($params); //execute


    if( $stmt->rowCount() > 0 ) { // If rows are found for query (if there is a match of user and password)

        session_start(); //begins the session
        $_SESSION["users_name"] = $users_login_name; //sets the session to the user name

        if(isset($_SESSION['users_name'])) //if the session was successful directs user to their dashboard
        {
            header('Location: newdash.php');
            exit;
        }

    }
    else { //if session was not properly set, display an error message
        
        echo "Wrong password or user does not exist";
        session_unset(); //destroys the session

    }
}
?>