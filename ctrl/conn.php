<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "web-pr-angkasa-raya";

$con = mysqli_connect($serverName, $userName, $password, $dbname);

if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}
?>