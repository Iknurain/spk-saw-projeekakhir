<?php

if(isset($_POST['simpan'])){
   
    $prestasi=$_POST['prestasi'];
    $rekomendasi=$_POST['rekomendasi'];
    $jarak=$_POST['jarak'];
    $hobi=$_POST['hobi'];
    
    $sql = "SELECT*FROM bobot";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql="UPDATE bobot SET prestasi='$prestasi',rekomendasi='$rekomendasi',jarak='$jarak',hobi='$hobi'";
        $conn->query($sql);
    }else{
        $sql = "INSERT INTO bobot VALUES ('$prestasi','$rekomendasi','$jarak','$hobi')";
        $conn->query($sql);
    }
    ?>
    <div class="alert alert-danger alert-dismissible" align="center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Data berhasil dimasukkan</strong>
    </div>
<?php
}

$sql = "SELECT*FROM bobot";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
}

?>

<div class="panel panel-primary" style="width: 600px;">
  <div class="panel-heading"><b>Data Bobot</b></div>
    <div class="panel-body border">
        <form action="" method="POST" name="Form" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Prestasi :</label>
                        <input type="number" class="form-control" name="prestasi" value="<?php echo $row['prestasi']; ?>" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label for="">Rekomendasi :</label>
                        <input type="number" class="form-control" name="rekomendasi" value="<?php echo $row['rekomendasi']; ?>" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label for="">Jarak :</label>
                        <input type="number" class="form-control" name="jarak" value="<?php echo $row['jarak']; ?>" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label for="">Hobi :</label>
                        <input type="number" class="form-control" name="hobi" value="<?php echo $row['hobi']; ?>" min="0" max="100">
                    </div>
                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validateForm()
    {
        let x=document.forms["Form"]["ipk"].value;
        let y=document.forms["Form"]["penghasilan"].value;
        let z=document.forms["Form"]["tanggungan"].value;

        let total=(+x)+(+y)+(+z);

        if (total<100)
        {
            alert("Total bobot masih kurang");
            return false;
        }

        if (total>100)
        {
            alert("Total bobot terlalu banyak");
            return false;
        }

    }
</script>

<?php
   $conn->close();
?>
