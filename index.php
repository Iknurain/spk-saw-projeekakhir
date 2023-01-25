<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
require "config.php";

$_SESSION['level'] = isset($_SESSION['level']) ? $_SESSION['level'] : "";

if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > 7200)) {
  session_destroy();
}

$_SESSION["last_activity"] = time();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIPEX</title>

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-min.css">
    <link rel="stylesheet" href="assets/css/dataTables.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <img class="img-fluid" src="pic/logo.png" alt="" style="width:30px;margin-top: 10px;">
        <a class="navbar-brand" href="#">SIPEX MTs SS Proto</a>
    </div>
    <ul class="nav navbar-nav">
        <?php
            if($_SESSION['level']=="Admin"){
        ?>
            <li><a href="?page=siswa">Siswa</a></li>
            <li><a href="?page=extra">Extrakurikuler</a></li>
            <li><a href="?page=bobot">Bobot</a></li>
            <li><a href="?page=rangking_adm">Perangkingan</a></li>
            <li><a href="?page=users">Users</a></li>
            <li><a href="?page=logout.php">Logout</a></li>
        <?php
            }elseif($_SESSION['level']=="Siswa"){
        ?>
            <li><a href="?page=kriteria">Kriteria</a></li>
            <li><a href="?page=rangking">Perangkingan</a></li>
            <li><a href="?page=logout.php">Logout</a></li>
        <?php
            }else{
        ?>
            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="?page=login">Login</a></li>
        <?php 
            }
        ?>
    </ul>
  </div>
</nav>

<div class="container" id="page-container">
<div id="content-wrap">

<?php

if(isset($_GET['msg'])){
    if($_GET['msg'] == "login_fail"){
    ?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Username atau kata sandi yang dimasukan salah</strong>
    </div>
    <?php
    }       
}

$page = isset($_GET['page']) ? $_GET['page'] : "";
$action = isset($_GET['action']) ? $_GET['action'] : "";

if ($page==""){
    include "welcome.php";
}elseif ($page=="login"){
        include "login.php";
}elseif ($page=="bobot"){
    if ($action==""){
        include "bobot_tambah.php";
    }
}elseif ($page=="siswa"){
    if ($action==""){
        include "siswa_tampil.php";
    }elseif ($action=="tambah"){
        include "siswa_tambah.php";
    }elseif ($action=="update"){
        include "siswa_update.php";
    }else{
        include "siswa_hapus.php";
    }
}elseif ($page=="extra"){
    if ($action==""){
        include "extra_tampil.php";
    }elseif ($action=="tambah"){
        include "extra_tambah.php";
    }elseif ($action=="update"){
        include "extra_update.php";
    }else{
        include "extra_hapus.php";
    }
}elseif ($page=="kriteria"){
    if ($action==""){
        include "kriteria_tampil.php";
    }elseif ($action=="tambah"){
        include "kriteria_tambah.php";
    }elseif ($action=="update"){
        include "kriteria_update.php";
    }else{
        include "kriteria_proses.php";
    }
}elseif ($page=="rangking"){
    if ($action==""){
        include "perangkingan.php";
    }
}elseif ($page=="rangking_adm"){
    if ($action==""){
        include "perangkingan_admin.php";
    }
}elseif ($page=="report"){
    if ($action==""){
        include "perangkingan_report.php";
    }
}elseif ($page=="users"){
    if ($action==""){
        include "users_tampil.php";
    }elseif ($action=="tambah"){
        include "users_tambah.php";
    }elseif ($action=="update"){
        include "users_update.php";
    }else{
        include "users_hapus.php";
    }
}else{
    if ($action==""){
        include "logout.php";
    }
}
?>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/all.min.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/chosen.jquery.min.js"></script>

<script>
      $(function() {
        $('.chosen-select').chosen();
      });
</script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>

</html>