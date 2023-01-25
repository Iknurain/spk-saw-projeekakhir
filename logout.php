<?php 
// menghapus semua session
// session_destroy();
// mengaktifkan session
session_start();
// mengalihkan halaman sambil mengirim pesan logout
$_SESSION['level']="";
header("Location:index.php");
?>