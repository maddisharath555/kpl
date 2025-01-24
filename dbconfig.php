<?php

// Database configuration

const DB_HOST     = "sql12.freesqldatabase.com";

const DB_USERNAME = "sql12759400";

const DB_PASSWORD = "sLEAnrsbbu";

const DB_NAME     = "sql12759400";

// Create database connection

$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection

if ($db->connect_error) {

    die("Connection failed: " . $db->connect_error);

}

//echo "Connected successfully";

?>
