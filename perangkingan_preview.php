<?php
    include "config.php";
    include "fpdf/fpdf.php";

    $angkatan=$_POST['angkatan'];

    class PDF extends FPDF
    {
        //Page footer
        function Footer()
        {
            //atur posisi 1.5 cm dari bawah
            $this->SetY(-1);
            //Arial italic 9
            $this->SetFont('Arial','I',9);
            //nomor halaman
            $this->Cell(0,0.8,'Halaman '.$this->PageNo().' dari {nb}',0,0,'C');
        }
    }

    $pdf = new PDF('P','cm','A4');
    // REPORT HEADER 
    $pdf->SetMargins(1,1,0.5);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(21,0.5,'MTs Salafiyah Syafiiyah Proto',0,1,'C');
    $pdf->Cell(21,0.5,'Laporan Perangkingan Extrakurikuler',0,1,'C');
    $pdf->Cell(21,0.5,'Angkatan '.''.$angkatan.'',0,1,'C');
    $pdf->Cell(21,0.5,'',0,1,'C');
    $pdf->ln(1);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(3,0.8,"Tanggal cetak : ".date("d/m/Y"),0,0,'L');
    // AKHIR REPORT HEADER

    // REPORT DETAIL
    
    $pdf->SetFont('Arial','B',10);
    $pdf->ln(1);
    $pdf->Cell(1,0.8,'No.',1,0,'L');
    $pdf->Cell(2,0.8,'NIS',1,0,'L');
    $pdf->Cell(7,0.8,'Nama Siswa',1,0,'L');
    $pdf->Cell(2,0.8,'Angkatan',1,0,'L');
    $pdf->Cell(5,0.8,'Nama Extrakurikuler',1,0,'L');
    $pdf->Cell(2,0.8,'Preferensi',1,1,'L');

    $no=1;
    $sql = "SELECT * FROM vrangking WHERE angkatan='$angkatan' ORDER BY NIS ASC, preferensi DESC";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(1,0.8,$no++,1,0,'L');
        $pdf->Cell(2,0.8,''.$row['nis'].'',1,0,'L');
        $pdf->Cell(7,0.8,''.$row['nama'].'',1,0,'L');
        $pdf->Cell(2,0.8,''.$row['angkatan'].'',1,0,'L');
        $pdf->Cell(5,0.8,''.$row['nama_extrakurikuler'].'',1,0,'L');
        $pdf->Cell(2,0.8,''.$row['preferensi'].'',1,1,'L');
    }

    $pdf->Output("Laporan_perangkingan.pdf","I");

?>
