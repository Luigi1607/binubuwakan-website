<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $stmt = $pdo->prepare("INSERT INTO cottages (title, description, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $price, $image_url]);

    header('Location: admin.php');
}
?>

<form method="POST">
  <input type="text" name="title" required>
  <textarea name="description" required></textarea>
  <input type="number" name="price" required>
  <input type="text" name="image_url" required>
  <button type="submit">Add Cottage</button>
</form>
