<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
/*
* This file allows changing/ updating the current users ticket.
*
*/

include "connect.php";
include "orderitem.php";


$ordertype = filter_input(INPUT_POST, "ordertype", FILTER_SANITIZE_STRING); //order type (web / seo / graphic)
$ordermessage = filter_input(INPUT_POST, "ordermessage", FILTER_SANITIZE_STRING); //order description
$budget = filter_input(INPUT_POST, "budget", FILTER_VALIDATE_INT); //order budget
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); //user name
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT); //order budget

$postcommand = "UPDATE orders SET ordertype = ?, ordermessage= ?, budget= ? WHERE orderID= ?"; //update orders in the DB

$stmt = $dbh->prepare($postcommand); //prepare command
$params=[$ordertype, $ordermessage, $budget,$id]; //pass parameters
$stmt->execute($params); //execute

?>