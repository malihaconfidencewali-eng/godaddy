<?php
include("db.php");

$domain_id = $_POST['domain_id'];
$conn->query("INSERT INTO cart (domain_id) VALUES ($domain_id)");
header("Location: cart.php");
exit;
?>
