<div class="panel panel-primary">
  <div class="panel-heading"><b>Perangkingan</b></div>
  <div class="panel-body border">
  </form>
  <table class="table table-bordered dt-responsive nowrap" id="myTable">
    <a class="btn btn-primary" href="?page=report" style="margin-bottom:10px;">
     <span class="fa fa-plus"></span> Laporan
    </a>
    <thead class="thead-light">
      <tr>
        <th width="50px">No.</th>
        <th width="80px">NIS</th>
        <th width="300px">Nama Siswa</th>
        <th width="100px">Angkatan</th>
        <th width="300px">Nama Extrakurikuler</th>
        <th width="80px">Preferensi</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $i=1;
            $sql = "SELECT * FROM vrangking ORDER BY nis ASC, preferensi DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['nis']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['angkatan']; ?></td>
                <td><?php echo $row['nama_extrakurikuler']; ?></td>
                <td><?php echo $row['preferensi']; ?></td>
            </tr>
        <?php
            }
            $conn->close();
        ?>
    </tbody>
  </table>
  </div>
</div>