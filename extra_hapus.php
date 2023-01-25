<?php
$kodene=$_GET['kode'];
$sql = "DELETE FROM extrakurikuler WHERE kode_extrakurikuler='$kodene'";
if ($conn->query($sql) === TRUE) {
    
    header("Location:?page=extra");
}
$conn->close();
?>