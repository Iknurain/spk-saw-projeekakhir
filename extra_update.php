<?php

$kodene=$_GET['kode'];

if(isset($_POST['update'])){

    $nama=$_POST['nama'];
    $ket=$_POST['ket'];

    $sql = "UPDATE extrakurikuler SET nama_extrakurikuler='$nama',keterangan='$ket' WHERE kode_extrakurikuler='$kodene'";

    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE users SET nama='$nama' WHERE username='$nis'";
        $conn->query($sql);
        header("location:index.php?page=extra");
    }
}

$sql = "SELECT * FROM extrakurikuler WHERE kode_extrakurikuler='$kodene'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="panel panel-primary">
  <div class="panel-heading"><b>Update Data Extrakurikuler</b></div>
    <div class="panel-body border">
        <form action="" method="POST" name="Form">
            <div class="row">
                <div class="col-lg-12">
                <div class="form-group">
                        <label for="">Nama Extrakurikuler :</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama_extrakurikuler']; ?>" maxlength="50" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan :</label>
                        <input type="text" class="form-control" name="ket" value="<?php echo $row['keterangan']; ?>" maxlength="100" autocomplete="off" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                    <a class="btn btn-danger" href="?page=extra">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
$conn->close();
?>