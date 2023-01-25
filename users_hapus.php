<?php
$username=$_GET['username'];

$sql = "DELETE FROM users WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    header("Location:?page=users");
}

$conn->close();
?>
