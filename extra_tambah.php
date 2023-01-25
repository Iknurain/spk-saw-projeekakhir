<?php

if(isset($_POST['simpan'])){
   
    $nama=$_POST['nama'];
    $ket=$_POST['ket'];
   
    $sql = "INSERT INTO extrakurikuler VALUES (Null,'$nama','$ket')";
    if ($sql) {
        $conn->query($sql);
        header("Location:?page=extra");
    }     
}

?>

<div class="panel panel-primary">
  <div class="panel-heading"><b>Input Data Extrakurikuler</b></div>
    <div class="panel-body border">
        <form action="" method="POST" name="Form" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Nama Extrakurikuler :</label>
                        <input type="text" class="form-control" name="nama" maxlength="50" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan :</label>
                        <input type="text" class="form-control" name="ket" maxlength="100" autocomplete="off" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                    <a class="btn btn-danger" href="?page=extra">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
   $conn->close();
?>
