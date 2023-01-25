<?php 
$username=$_GET['username'];

if (isset($_POST['update'])){
    
    $username=$_POST['username'];

    $sql = "SELECT*FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ($_POST['pass']==''){
        $pass=$row['pass'];
    }else{
        $pass=md5($_POST['pass']);
    }

    $level=$_POST['level'];
    
    $sql="UPDATE users SET pass='$pass',level='$level' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        header("location:?page=users");
    }
}

$sql = "SELECT*FROM users WHERE username='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc()
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading"><b>Update Data Users</b></div>
            <div class="panel-body">
            <form method="POST" name="Form" onsubmit="return validateForm()">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" value="<?php echo $row['username']; ?>" readonly>
                </div>
                <div class="form-group">
                        <label for="">Nama Pengguna :</label>
                        <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" name="nama" maxlength="50" autocomplete="off" required>
                    </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" value="">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="chosen-select" data-placeholder="Pilih Level" name="level">
                    <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>;
                        <option value="Pimpinan">Pimpinan</option>;
                        <option value="Admin">Admin</option>;
                    </select>
                </div>         
                <input class="btn btn-primary" type="submit" name="update" value="Update">
                <a class="btn btn-danger" href="?page=users">Batal</a>
            </div>
        </form>
    </div>
</div> 

<?php
$conn->close();
?>

<script type="text/javascript">
    function validateForm()
    {
        var level=document.forms["Form"]["level"].value;

        if (level=="")
        {
            alert("Masukkan level");
            return false;
        }
    }
</script>