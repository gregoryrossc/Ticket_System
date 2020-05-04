<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
/*
* Deletes an item from the tickets / orderitems in the database.
*
*/

include "connect.php";
include "orderitem.php";

$orderID = filter_input(INPUT_POST, "orderID", FILTER_VALIDATE_INT); //ticket / order item ID to be deleted

$deletecommand = "DELETE FROM orders WHERE orderID = ?"; //command to delete item from shoppinglist

$stmt = $dbh->prepare($deletecommand); //prepares the deletcommand
$params=[$orderID]; //loads orderID into parameters
$stmt->execute($params); //exectute

?>