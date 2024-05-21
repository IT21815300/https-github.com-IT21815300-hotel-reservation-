<?php

require 'vendor/autoload.php';

print_r($_POST);

$Username = $_POST['Username'];
$password = $_POST['password'];

// Connection
$conn = new mysqli('localhost', 'root', '', 'hotel_reservation_system');
if ($conn->connect_error) {
    die('Connection Failed :' . $conn->connect_error);
} else {
    // Generate a secret key for 2FA
    $g = new \PHPGangsta_GoogleAuthenticator();
    $secret = $g->createSecret();

    // Store username, password, and secret in the database
    $stmt = $conn->prepare("INSERT INTO users (Username, password, secret) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Username, $password, $secret);
    $execval = $stmt->execute();
    
    if ($execval) {
        // Generate a QR code URL
       
?>