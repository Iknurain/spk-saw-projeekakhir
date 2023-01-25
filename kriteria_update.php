<?php

$kodene=$_GET['kode'];

if(isset($_POST['update'])){

    $prestasi=$_POST['prestasi'];
    $rekomendasi=$_POST['rekomendasi'];
    $jarak=$_POST['jarak'];
    $hobi=$_POST['hobi'];

    $sql = "UPDATE kriteria SET prestasi='$prestasi',rekomendasi='$rekomendasi',jarak='$jarak',hobi='$hobi' WHERE kdkriteria='$kodene'";
    $conn->query($sql);
    header("location:index.php?page=kriteria");

}

$sql = "SELECT * FROM vkriteria WHERE kdkriteria='$kodene'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="panel panel-primary">
  <div class="panel-heading"><b>Update Data Siswa</b></div>
    <div class="panel-body border">
        <form action="" method="POST" name="Form" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                            <label for="">Nama Extrakurikuler : </label>
                            <input type="text" class="form-control" value="<?php echo $row['nama_extrakurikuler']; ?>" readonly>
                        </div>
                    <div class="form-group">
                        <label for="">Jumlah Prestasi :</label>
                        <select class="form-control chosen-select" data-placeholder="Pilih Jumlah Prestasi" name="prestasi">
                        <option value="<?php echo $row['prestasi']; ?>"><?php echo $row['prestasi']; ?></option>
                            <option value="5">Lebih dari 1</option>
                            <option value="3">1</option>
                            <option value="1">0</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Rekomendasi Orang Tua :</label>
                        <select class="form-control chosen-select" data-placeholder="Pilih Rekmendasi Orang Tua" name="rekomendasi">
                            <option value="<?php echo $row['rekomendasi']; ?>"><?php echo $row['rekomendasi']; ?></option>
                            <option value="5">Sangat Rekomendasi</option>
                            <option value="3">Rekomendasi</option>
                            <option value="1">Tidak Rekomendasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jarak :</label>
                        <select class="form-control chosen-select" data-placeholder="Pilih Jarak" name="jarak">
                            <option value="<?php echo $row['jarak']; ?>"><?php echo $row['jarak']; ?></option>
                            <option value="5">Jauh</option>
                            <option value="3">Pondok</option>
                            <option value="1">Dekat</option>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="">Hobi :</label>
                        <select class="form-control chosen-select" data-placeholder="Pilih Hobi" name="hobi">
                            <option value="<?php echo $row['hobi']; ?>"><?php echo $row['hobi']; ?></option>
                            <option value="5">Sangat Suka</option>
                            <option value="3">Sedikit Suka</option>
                            <option value="1">Tidak Suka</option>
                        </select>                    
                    </div>
                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                    <a class="btn btn-danger" href="?page=kriteria">Batal</a>
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
        var prestasi=document.forms["Form"]["prestasi"].value;
        var rekomendasi=document.forms["Form"]["rekomendasi"].value;
        var jarak=document.forms["Form"]["jarak"].value;
        var hobi=document.forms["Form"]["hobi"].value;


        if (prestasi=="")
        {
            alert("Masukkan jumlah prestasi");
            return false;
        }

        if (rekomendasi=="")
        {
            alert("Masukkan rekomendasi");
            return false;
        }

        if (jarak=="")
        {
            alert("Masukkan rekomendasi");
            return false;
        }

        if (hobi=="")
        {
            alert("Masukkan hobi");
            return false;
        }
    }
</script>