<?php

$servername = "localhost";
$username = "bravo";
$password = "245809";
$db = "test";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
