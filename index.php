<?php
include 'config.php';

$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

echo "<h1>User List</h1>";
echo "<a href='create.php'>Create New User</a><br><br>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"];
        echo " <a href='edit.php?id=" . $row["id"] . "'>Edit</a> ";
        echo " <a href='delete.php?id=" . $row["id"] . "'>Delete</a><br>";
    }
} else {
    echo "No users found.";
}

$conn->close();
?>
