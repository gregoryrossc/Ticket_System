<?php
   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.
/**
 * logout page
 */
session_start(); //carries session over
session_unset(); //unsets the session
session_destroy(); //destroys session
?><!DOCTYPE html>
<html>

<head>
    <title>Log out page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>You are logged out.</h1>
    <a href="http://localhost/webapp">Log in again</a>
</body>

</html>