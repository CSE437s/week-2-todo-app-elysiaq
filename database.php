<?php
$host = "localhost";
$username = "elysia";
$password = "elysia";
$database = "todo";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}

$mysqli->set_charset("utf8");

?>