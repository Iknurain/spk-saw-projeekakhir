<?php

if(isset($_POST['simpan'])){
   
    $nis=$_POST['nis'];
    $nama=addslashes($_POST['nama']);
    $angkatan=$_POST['angkatan'];
    $tmp=$_POST['tmp'];
    $tgllhr=$_POST['tgllhr'];
    $alamat=$_POST['alamat'];
    $jenkel=$_POST['jenkel'];
    $telp=$_POST['telp'];
   
    $sql = "SELECT*FROM siswa WHERE nis='$nis'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
            <div class="alert alert-danger alert-dismissible" align="center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>NIS sudah digunakan</strong>
            </div>
        <?php
    }else{
        $sql = "INSERT INTO siswa VALUES ('$nis','$nama','$angkatan','$tmp','$tgllhr','$alamat','$jenkel','$telp')";
        if ($conn->query($sql) === TRUE) {

            $pass=md5($_POST['nis']);
    
            $sql = "INSERT INTO users VALUES('$nis','$pass','$nama','Siswa')";
            $conn->query($sql);
            header("Location:?page=siswa");
        }
    }       
}

?>

<div class="panel panel-primary">
  <div class="panel-heading"><b>Input Data Siswa</b></div>
    <div class="panel-body border">
        <form action="" method="POST" name="Form" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">NIS:</label>
                        <input type="text" class="form-control" name="nis" maxlength="20" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa :</label>
                        <input type="text" class="form-control" name="nama" maxlength="100" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                    <label for="">Angkatan : </label>
                        <select class="chosen-select" data-placeholder="Pilih Angkatan" id="angkatan" name="angkatan">
                            <option value=""></option>
                            <?php 
                                for($i=date("Y");$i>=2015;$i--){
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tmp">Tempat Lahir :</label>
                        <input type="text" class="form-control" name="tmp" maxlength="100" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="tgllhr">Tanggal Lahir :</label>
                        <input type="date" class="form-control" name="tgllhr" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <input type="text" class="form-control" name="alamat" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="jenkel">Jenis Kelamin :</label>
                        <select class="form-control chosen-select" data-placeholder="Pilih Jenis Kelamin" name="jenkel">
                            <option value=""></option>;
                            <option value="L">L</option>;
                            <option value="P">P</option>;
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telp">No.Telp :</label>
                        <input type="text" class="form-control" name="telp" maxlength="15" autocomplete="off" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                    <a class="btn btn-danger" href="?page=siswa">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validateForm()
    {
        var angkatan=document.forms["Form"]["angkatan"].value;
        var jenkel=document.forms["Form"]["jenkel"].value;

        if (angkatan=="")
        {
            alert("Masukkan Angkatan");
            return false;
        }

        if (jenkel=="")
        {
            alert("Masukkan Jenis Kelamin");
            return false;
        }
    }
</script>

<?php
   $conn->close();
?>
