<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
/**
 * Returns a json-encoded list of User objects drawn from a database.
 */
include "connect.php";
include "orderitem.php";

$orderID = filter_input(INPUT_POST, "orderID", FILTER_VALIDATE_INT); //order id of item to be edited

// Prepare and execute the DB query
$command = "SELECT orderID, ordertype, ordermessage, budget FROM orders WHERE orderID = ?"; //lists attributes of order
$stmt = $dbh->prepare($command); //prepare select command
$params=[$orderID]; // orderID into parameters
$success = $stmt->execute($params); //execture

// Fill an array with User objects based on the results.
$entirelist = [];
while ($row = $stmt->fetch()) { 
    $orderitem = new Orderitem($row["orderID"], $row["ordertype"], $row["ordermessage"], $row["budget"]); //populates ticket / Orderitem with new values
    array_push($entirelist, $orderitem); //pushes order item into the list / table of tickets
}

// Write the json encoded array to the HTTP Response
echo json_encode($entirelist); 