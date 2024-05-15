<?php
// Include the database connection
include 'db_connection.php';

// Fetch all items from the database
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Display all items
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
    <title>CRUD Application - List of Items</title>
	
</head>
<body>
    <h1>List of Items</h1>
    <a href="create.php"><button>Add New Item</button></a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>"><button1>Edit</button1></a>
                <a href="delete.php?id=<?php echo $row['id']; ?>"><button1>Delete</button1></a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
