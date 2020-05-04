<?php

   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.

/*
* This file adds a user ticket / orderitem to the database and then
* returns the tickets updated to the correct user.
*/

include "connect.php"; 
include "orderitem.php";


$ordertype = filter_input(INPUT_POST, "ordertype", FILTER_SANITIZE_STRING); //type of order (SEO, Web Or Graphic Design)
$ordermessage = filter_input(INPUT_POST, "ordermessage", FILTER_SANITIZE_STRING); //order message
$budget = filter_input(INPUT_POST, "budget", FILTER_VALIDATE_INT); //order budget
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); //user name tied to the ticket / orderitem

$postcommand = "INSERT INTO orders (ordertype, ordermessage, budget,user_name) VALUES (?, ?, ?, ?)"; //command for inserting values into the DB

$stmt = $dbh->prepare($postcommand); //prepare command
$params=[$ordertype, $ordermessage, $budget, $name]; //load the parameters
$stmt->execute($params); //exectutes command with parameters

//selecting the updated list from database
$command = "SELECT max(orderID) FROM orders WHERE user_name = ?"; //selects the orders by user name
$stmt = $dbh->prepare($command); //prepare
$params=[$name]; //loads user name in parameters
$success = $stmt->execute($params); //executes statement

$result = $stmt->fetch(); //does the fetch

// Write the json encoded array to the HTTP Response
echo ($result[0]);

?>