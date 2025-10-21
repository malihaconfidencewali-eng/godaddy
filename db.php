<?php
$host = "localhost";
$user = "upb3cvekgq13h";
$password = "qf4b48htafbb";
$dbname = "dbfcpq9vqvkgaa";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
