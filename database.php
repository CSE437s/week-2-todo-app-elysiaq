<?php
// Database connection parameters
$host = "localhost";
$username = "elysia";
$password = "elysia";
$database = "todo";

// Create a MySQLi database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_errno) {
    printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}

$mysqli->set_charset("utf8");

?>