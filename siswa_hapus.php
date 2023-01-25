<?php
$nise=$_GET['nis'];
$sql = "DELETE FROM siswa WHERE nis='$nise'";
if ($conn->query($sql) === TRUE) {

    $sql = "DELETE FROM users WHERE username='$nise'";
    $conn->query($sql);
    
    header("Location:?page=siswa");
}
$conn->close();
?>