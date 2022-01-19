<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shodai_app";
// connection
$db = new mysqli($servername, $username, $password, $database);

if ($db->connect_error) {
  die("Connection Failed" . $db->connect_error);
}
