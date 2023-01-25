<div class="panel panel-primary" style="margin-bottom: 20px;">
<div class="panel-heading"><b>Data Users</b></div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="myTable">
            <a class="btn btn-primary" href="?page=users&action=tambah" style="margin-bottom:10px;">
                <span class="fa fa-plus"></span> Tambah
            </a>
            <thead>
                <tr>
                    <th width="30"><strong> No. </strong></th>
                    <th width="300"><strong> User Name</strong></th>
                    <th width="300"><strong> Nama Pengguna</strong></th>
                    <th width="100"><strong> Level </strong></th>
                    <th width="80"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    $sql = "SELECT*FROM users ORDER BY username ASC";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $row['username']; ?> </td>
                        <td> <?php echo $row['nama']; ?> </td>
                        <td> <?php echo $row['level']; ?> </td>
                        <td align="center" width="50">
                            <a href="?page=users&action=update&username=<?php echo $row['username']; ?>" class="btn btn-warning">
                            <span class="fa fa-wrench"></span>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini ?')" href="?page=users&action=hapus&username=<?php echo $row['username']; ?>" class="btn btn-danger">
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
</div>