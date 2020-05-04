<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
/**
* this file connects to the mysql database users
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=000101968",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
