<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Update the item in the database
    $sql = "UPDATE items SET name='$name', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    // Fetch the item to be edited
    $sql = "SELECT * FROM items WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style1.css">
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        <label>Description:</label><br>
        <textarea name="description"><?php echo $row['description']; ?></textarea><br>
        <button type="submit">Update Item</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
