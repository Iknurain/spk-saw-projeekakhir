<?php
    if (isset($_POST['simpan'])){
        $username=$_POST['username'];
        $pass=md5($_POST['pass']);
        $level=$_POST['level'];

        $sql = "INSERT INTO users VALUES('$username','$pass','$level')";
        if ($conn->query($sql) === TRUE) {
            header("location:index.php?page=users");
        }
    }
    $conn->close();
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading"><b>Input Data Users</b></div>
                <div class="panel-body">
                <form method="POST" name="Form" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="">Username :</label>
                        <input type="text" class="form-control" name="username" maxlength="10" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pengguna :</label>
                        <input type="text" class="form-control" name="nama" maxlength="50" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password :</label>
                        <input type="password" class="form-control" name="pass" maxlength="10" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="chosen-select" data-placeholder="Pilih Level" name="level">
                        <option value=""></option>;
                            <option value="Admin">Admin</option>;
                            <option value="Siswa">Siswa</option>;
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                    <a href="?page=users" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validateForm()
    {
        let level=document.forms["Form"]["level"].value;

        if (level=="")
        {
            alert("Masukkan level");
            return false;
        }
    }
</script>