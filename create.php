<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Insert the new item into the database
    $sql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style1.css">
    <title>Add New Item</title>
	<style>
		.container{
position: relative;
width: 560px;
height: 300px;
max-width: 100%;
min-height: 900;
background: #fff;
border-radius: 20px;
padding:20px;
margin-top:10px;
overflow: hidden;
box-shadow: 0 14px 28px rgba(0,0,0,0.25),
            0 10px 10px   rgba(0,0,0,0.22)
}
body{
    align-items: center;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color:azure;
    font-family: 'monserrat', sans-serif;
    min-height: 100%;
    margin: 10%;
	margin-top: 80px;
	
}

	</style>
</head>
<body>
        <h1>Add New Item</h1>
		<div class="container">
    <form method="POST" onsubmit="return validateForm()">
        <label>Name:</label><br>
        <input type="text" name="name" id="name"><br>
        <label>Description:</label><br>
        <textarea name="description" id="description"></textarea><br>
        <div class="error-message" id="error-message"></div>
        <button type="submit">Add Item</button>
    </form>
	   </div>

	<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var description = document.getElementById('description').value;
        var errorMessage = document.getElementById('error-message');

        if (name.trim() === '' || description.trim() === '') {
            errorMessage.innerHTML = 'Please fill in both name and description fields.';
            return false;
        } else {
            errorMessage.innerHTML = '';
            return true;
        }
    }
    </script>

</body>
</html>

<?php
$conn->close();
?>
