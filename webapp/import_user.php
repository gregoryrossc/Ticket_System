<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
/*
* This file registers a new user into the database.
*/


include "connect.php"; //includes connection file
include "user.php"; //includes the user class file


//calls if post information is submitted
if (isset($_POST['submit']))
        {
        $users_email = filter_input(INPUT_POST, 'users_email', FILTER_SANITIZE_EMAIL); //email address 
        $users_name = filter_input(INPUT_POST, 'users_name', FILTER_SANITIZE_STRING); // user name
        $users_password = filter_input(INPUT_POST, 'users_password', FILTER_SANITIZE_STRING); // user password
        }

        $stmt = $dbh->prepare( "SELECT users_email FROM users WHERE users_email = ?" ); //prepare the select statement for importing a user
        $stmt->bindValue( 1, $users_email ); //checks if email exists
        $stmt->execute(); //executes

            if( $stmt->rowCount() > 0 ) { // If rows are found for query

                echo "email already exists!";
            }
            else{
        
            //adds a new record if email not found in database.
            $INSERT = "INSERT INTO users (users_email, users_name, users_password) VALUES (?, ?, ?)";     
            $stmt = $dbh->prepare($INSERT);
            $params = [$users_email, $users_name, $users_password]; //inserts paramaters as well as current date and time of record.
            $stmt->execute($params);

        
            // Fill an array with User objects based on the results.
            $userlist = [];
            while ($row = $stmt->fetch()) { 
            $user = new User($row["users_email"], $row["users_name"], $row["users_password"]); 
            array_push($userlist, $user); //pushes new user to the array
            }

            echo "Registration Success!";

            echo '<br><a href="http://localhost/webapp">Log In Here</a>';

    }
?>