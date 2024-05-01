<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbx = "nyateti";

// Create connection
$gate = new mysqli($servername, $username, $password, $dbx);

// Check connection
if ($gate->connect_error) {
  die("ERR : " . $gate->connect_error);
}

?>