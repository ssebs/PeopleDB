<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

$conn = new mysqli('localhost','ssebs','ssebs2721','People');

if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
}


?>
