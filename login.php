<div class="container-fluid" style="margin-top:150px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form method="POST">
                <div class="panel panel-primary">
                    <div class="panel-heading text-white">
                        <img class="img-fluid" src="pic/logo.png" alt="" style="width:40px;">
                        <strong>LOGIN</strong>
                    </div>
                    <div class="panel-body border">
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" autocomplete="off" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if(isset($_POST["submit"])){

    $username=$_POST["username"];
    $pass=md5($_POST["pass"]);

    $sql = "SELECT*FROM users where username='$username' and pass='$pass'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        
        $_SESSION['username'] = $row["username"];
        $_SESSION['nama'] = $row["nama"];
        $_SESSION['level'] = $row["level"];
        $_SESSION['last_activity'] = time();
        $_SESSION['status'] = "succes";
    
        header("Location:index.php");

    } else {
        header("Location:?msg=login_fail");
    }
}
$conn->close();
?>



