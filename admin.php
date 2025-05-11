<?php
require 'db.php';

// Fetch all cottages
$stmt = $pdo->query("SELECT * FROM cottages");
$cottages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <!-- Include Bootstrap CSS -->
</head>
<body>
  <h1>Manage Cottages</h1>
  <table>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Price</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
    <?php foreach ($cottages as $cottage): ?>
    <tr>
      <td><?= htmlspecialchars($cottage['title']) ?></td>
      <td><?= htmlspecialchars($cottage['description']) ?></td>
      <td><?= htmlspecialchars($cottage['price']) ?></td>
      <td><img src="<?= htmlspecialchars($cottage['image_url']) ?>" width="100"></td>
      <td>
        <a href="edit_cottage.php?id=<?= $cottage['id'] ?>">Edit</a>
        <a href="delete_cottage.php?id=<?= $cottage['id'] ?>">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <a href="add_cottage.php">Add New Cottage</a>
</body>
</html>
