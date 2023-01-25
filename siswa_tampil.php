<div class="panel panel-primary">
  <div class="panel-heading"><b>Data Siswa</b></div>
    <div class="panel-body border">
    <table class="table table-bordered dt-responsive nowrap" id="myTable">
    <a class="btn btn-primary" href="?page=siswa&action=tambah" style="margin-bottom:10px;">
     <span class="fa fa-plus"></span> Tambah
    </a>
    <thead class="thead-light">
      <tr>
        <th width="80px">NIS</th>
        <th width="200px">Nama Siswa</th>
        <th width="80px">Angkatan</th>
        <th width="200px">Alamat</th>
        <th width="100px">Telp</th>
        <th width="80px"></th>
      </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM Siswa ORDER BY angkatan DESC, nis DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['nis']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['angkatan']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['telp']; ?></td>
                <td align="center">
                    <a class="btn btn-warning" href="?page=siswa&action=update&nis=<?php echo $row['nis']; ?>">
                        <span class="fa fa-wrench"></span>
                    </a>
                    <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=siswa&action=hapus&nis=<?php echo $row['nis']; ?>">
                        <span class="fa fa-trash"></span>
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