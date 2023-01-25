<div class="panel panel-primary">
  <div class="panel-heading"><b>Data Kriteria</b></div>
  <div class="panel-body border">
  <table class="table table-bordered dt-responsive nowrap" id="myTable">
    <a class="btn btn-primary" href="?page=kriteria&action=tambah" style="margin-bottom:10px;">
     <span class="fa fa-plus"></span> Data Baru
    </a>
    <a class="btn btn-primary" href="?page=kriteria&action=proses" style="margin-bottom:10px;margin-left:10px;">
     <span class="fa fa-plus"></span> Proses
    </a>

    <thead class="thead-light">
      <tr> 
        <th width="50px">No.</th>
        <th width="150px">Nama Extrakurikuler</th>
        <th width="100px">Prestasi</th>
        <th width="100px">Rekomedasi Orang Tua</th>
        <th width="100px">Jarak</th>
        <th width="100px">Hobi</th>
        <th width="80px"></th>
      </tr>
    </thead>
    <tbody>
        <?php
            $usere=$_SESSION['username'];
            $i=1;
            $sql = "SELECT*FROM vkriteria WHERE nis='$usere' ORDER BY nama_extrakurikuler ASC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['nama_extrakurikuler']; ?></td>
                <td><?php echo $row['prestasi']; ?></td>
                <td><?php echo $row['rekomendasi']; ?></td>
                <td><?php echo $row['jarak']; ?></td>
                <td><?php echo $row['hobi']; ?></td>
                <td align="center">
                    <a class="btn btn-warning" href="?page=kriteria&action=update&kode=<?php echo $row['kdkriteria']; ?>">
                        <span class="fa fa-wrench"></span>
                    </a>
                </td>
            </tr>
        <?php
            }
            $conn->close();
        ?>
    </tbody>
  </table>
  </div>
</div>