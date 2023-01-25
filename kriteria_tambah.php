<?php

    $usere=$_SESSION['username'];

    $sql = "DELETE FROM kriteria WHERE nis='$usere'";
    $result = $conn->query($sql);

    $sql = "SELECT*FROM kriteria WHERE nis='$usere'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $kodene=$row['kode_kriteria'];

        $sql = "DELETE FROM perangkingan WHERE kdkriteria='$kodene'";
        $result = $conn->query($sql);
    }

    $sql = "SELECT*FROM extrakurikuler";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {

        $kode_extra=$row['kode_extrakurikuler'];

        $sql = "INSERT INTO kriteria VALUES (Null,'$usere','$kode_extra','-','-','-','-')";
        $conn->query($sql);
    }
    header("Location:?page=kriteria");
         
?>