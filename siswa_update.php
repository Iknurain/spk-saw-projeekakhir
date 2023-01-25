<?php

$nise=$_GET['nis'];

if(isset($_POST['update'])){

    $nis=$_POST['nis'];
    $nama=addslashes($_POST['nama']);
    $angkatan=$_POST['angkatan'];
    $tmp=$_POST['tmp'];
    $tgllhr=$_POST['tgllhr'];
    $alamat=$_POST['alamat'];
    $jenkel=$_POST['jenkel'];
    $telp=$_POST['telp'];   

    if($nis==$nise){

        $sql = "UPDATE siswa SET nama='$nama',angkatan='$angkatan',tmplahir='$tmp',tgllahir='$tgllhr',
                                alamat='$alamat',jenkel='$jenkel',telp='$telp' WHERE nis='$nis'";

        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE users SET nama='$nama' WHERE username='$nis'";
            $conn->query($sql);
            header("location:index.php?page=siswa");
        }

    }else{

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
            $sql = "UPDATE siswa SET nis='$nis',nama='$nama',angkatan='$angkatan',tmplahir='$tmp',tgllahir='$tgllhr',
                                    alamat='$alamat',jenkel='$jenkel',telp='$telp' WHERE nis='$nis'";

            if ($conn->query($sql) === TRUE) {
                $sql = "UPDATE users SET nama='$nama' WHERE username='$nis'";
                $conn->query($sql);
                header("location:index.php?page=siswa");
            }
        } 
    }
}

$sql = "SELECT * FROM siswa WHERE nis='$nise'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="panel panel-primary">
  <div class="panel-heading"><b>Update Data Siswa</b></div>
    <div class="panel-body border">
        <form action="" method="POST" name="Form" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">NIS :</label>
                        <input type="text" class="form-control" value="<?php echo $row['nis']; ?>"  name="nis" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa :</label>
                        <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" name="nama" maxlength="100" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                    <label for="">Angkatan : </label>
                        <select class="chosen-select" data-placeholder="Pilih Angkatan" id="angkatan" name="angkatan">
                            <option value="<?php echo $row['angkatan']; ?>"><?php echo $row['angkatan']; ?></option>
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
                        <input type="text" class="form-control" value="<?php echo $row['tmplahir']; ?>" name="tmp" maxlength="100" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="tgllhr">Tanggal Lahir :</label>
                        <input type="date" class="form-control" value="<?php echo $row['tgllahir']; ?>" name="tgllhr" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <input type="text" class="form-control" value="<?php echo $row['alamat']; ?>" name="alamat" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="jenkel">Jenis Kelamin :</label>
                        <select class="form-control chosen-select" data-placeholder="Pilih Jenis Kelamin" name="jenkel">
                        <option value="<?php echo $row['jenkel']; ?>"><?php echo $row['jenkel']; ?></option>;
                            <option value="L">L</option>;
                            <option value="P">P</option>;
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telp">No.Telp :</label>
                        <input type="text" class="form-control" value="<?php echo $row['telp']; ?>" name="telp" maxlength="15" autocomplete="off" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                    <a class="btn btn-danger" href="?page=siswa">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
$conn->close();
?>

<script type="text/javascript">
    function validateForm()
    {
        var nmprog=document.forms["Form"]["nmprog"].value;
        var jenkel=document.forms["Form"]["jenkel"].value;

        if (nmprog=="")
        {
            alert("Masukkan Nama Program Studi");
            return false;
        }

        if (jenkel=="")
        {
            alert("Masukkan Jenis Kelamin");
            return false;
        }
    }
</script>