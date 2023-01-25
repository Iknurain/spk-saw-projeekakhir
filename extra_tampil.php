<div class="panel panel-primary">
  <div class="panel-heading"><b>Data Extrakurikuler</b></div>
    <div class="panel-body border">
    <table class="table table-bordered dt-responsive nowrap" id="myTable">
    <a class="btn btn-primary" href="?page=extra&action=tambah" style="margin-bottom:10px;">
     <span class="fa fa-plus"></span> Tambah
    </a>
    <thead class="thead-light">
      <tr>
        <th width="50px">No.</th>
        <th width="400px">Nama Extrakurikuler</th>
        <th width="500px">Keterangan</th>
        <th width="80px"></th>
      </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            $sql = "SELECT * FROM extrakurikuler ORDER BY nama_extrakurikuler ASC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_extrakurikuler']; ?></td>
                <td><?php echo $row['keterangan']; ?></td>
                <td align="center">
                    <a class="btn btn-warning" href="?page=extra&action=update&kode=<?php echo $row['kode_extrakurikuler']; ?>">
                        <span class="fa fa-wrench"></span>
                    </a>
                    <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=extra&action=hapus&kode=<?php echo $row['kode_extrakurikuler']; ?>">
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