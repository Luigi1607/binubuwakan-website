<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // your password
$dbname = "resort_booking"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$idType = $_POST['idType'];
$payment = $_POST['payment'];
$idNumber = $_POST['idNumber'];
$guests = $_POST['guests'];
$requests = $_POST['requests'];

// Insert into database
$sql = "INSERT INTO bookings (name, email, checkin, checkout, idType, payment, idNumber, guests, requests)
VALUES ('$name', '$email', '$checkin', '$checkout', '$idType', '$payment', '$idNumber', '$guests', '$requests')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Booking successful!'); window.location.href='book.html';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
