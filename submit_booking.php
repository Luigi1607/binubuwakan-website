<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $id_type = $_POST['idType'];
    $id_number = $_POST['idNumber'];
    $payment_method = $_POST['payment'];
    $guests = $_POST['guests'];
    $special_requests = $_POST['requests'];
    $cottage_id = $_POST['cottage_id']; // Ensure this is passed from the form

    // Insert reservation into database
    $stmt = $pdo->prepare("INSERT INTO reservations (name, email, checkin, checkout, id_type, id_number, payment_method, guests, special_requests, cottage_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $checkin, $checkout, $id_type, $id_number, $payment_method, $guests, $special_requests, $cottage_id]);

    echo "Booking submitted successfully!";
}
?>
