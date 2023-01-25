<?php

$usere=$_SESSION['username'];

 $sql = "SELECT*FROM kriteria WHERE nis='$usere' and prestasi='-' and rekomendasi='-' and jarak='-' and hobi='-'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    ?>
        <div class="alert alert-danger alert-dismissible" align="center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Data kriteria belum lengkap, silahkan kembali ke halaman kriteria</strong>
        </div>
    <?php
 }else{

    // mencari nilai min dan max 
    $sql = "SELECT max(prestasi) as mprestasi,max(rekomendasi) as mrekomendasi,min(jarak) as mjarak,max(hobi) as mhobi FROM kriteria WHERE nis='$usere'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $mprestasi=$row['mprestasi'];
    $mrekomendasi=$row['mrekomendasi'];
    $mjarak=$row['mjarak'];
    $mhobi=$row['mhobi'];

    // proses normalisasi
    $sql = "SELECT kdkriteria,prestasi,rekomendasi,jarak,hobi FROM kriteria WHERE nis='$usere'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {

        $kdkriteria=$row['kdkriteria'];
        $prestasi=$row['prestasi'];
        $rekomendasi=$row['rekomendasi'];
        $jarak=$row['jarak'];
        $hobi=$row['hobi'];

        // hapus data lama
        $sql2 = "DELETE FROM perangkingan WHERE kdkriteria='$kdkriteria'";
        $result2 = $conn->query($sql2);

        // mencari nilai normalisasi
        $npretasi=$prestasi/$mprestasi;
        $nrekomendasi=$rekomendasi/$mrekomendasi;
        $njarak=$mjarak/$jarak;
        $nhobi=$hobi/$mhobi;

        $sql2 = "SELECT*FROM bobot";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();

        $bprestasi=($row2['prestasi'])/100;
        $brekomendasi=($row2['rekomendasi'])/100;
        $bjarak=($row2['jarak'])/100;
        $bhobi=($row2['hobi'])/100;

        // mencari nilai preferensi
        $pref=($npretasi*$bprestasi)+($nrekomendasi*$brekomendasi)+($njarak*$bjarak)+($nhobi*$bhobi);

        // proses simpan data perangkingan
        $sql = "INSERT INTO perangkingan VALUES (Null,'$kdkriteria','$npretasi','$nrekomendasi','$njarak','$nhobi','$pref')";
        $conn->query($sql);
    }
    header("Location:?page=rangking");
 }  
?>