<div class="panel panel-primary">
  <div class="panel-heading"><b>Perangkingan</b></div>
  <div class="panel-body border">
  </form>
  <table class="table table-bordered dt-responsive nowrap" id="myTable">
    <thead class="thead-light">
      <tr>
        <th width="50px">No.</th>
        <th width="500px">Nama Extrakurikuler</th>
        <th width="80px">nPrestasi</th>
        <th width="80px">nRekomendasi</th>
        <th width="80px">nJarak</th>
        <th width="80px">nHobi</th>
        <th width="80px">Preferensi</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $usere=$_SESSION['username'];

            $i=1;
            $sql = "SELECT * FROM vrangking WHERE nis='$usere' ORDER BY preferensi DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['nama_extrakurikuler']; ?></td>
                <td><?php echo $row['nprestasi']; ?></td>
                <td><?php echo $row['nrekomendasi']; ?></td>
                <td><?php echo $row['njarak']; ?></td>
                <td><?php echo $row['nhobi']; ?></td>
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