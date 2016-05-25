<?php
$servernameBd = "localhost";
$usernameBd = "root";
$passwordBd = "";
$dbname = "TIM_bedards_mpf_DB";
// Create connection
$conn = new mysqli($servernameBd, $usernameBd, $passwordBd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
