<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
/**
 * Returns a json-encoded list of updated ticket objects drawn from the database.
 * 
 *
 */

include "connect.php";
include "orderitem.php";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); //user name

// Prepare and execute the DB query
$command = "SELECT orderID, ordertype, ordermessage, budget FROM orders WHERE user_name = ?"; //lists attributes of order
$stmt = $dbh->prepare($command); //prepare select command
$params=[$name]; //prepare name in parameters
$success = $stmt->execute($params); //execute

// Fill an array with User objects based on the results.
$entirelist = [];
while ($row = $stmt->fetch()) {
    $orderitem = new Orderitem($row["orderID"], $row["ordertype"], $row["ordermessage"], $row["budget"]);
    array_push($entirelist, $orderitem);
}

// Write the json encoded array to the HTTP Response
echo json_encode($entirelist);
