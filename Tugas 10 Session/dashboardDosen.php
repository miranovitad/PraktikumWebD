<?php
session_start();

$id     = $_SESSION['id'];
$nama   = $_SESSION['nama'];
$rule   = $_SESSION['rule'];

if (empty($_SESSION['id'])){
  echo "<script>alert('Mohon Login Terlebih Dahulu'); location.href='login.php';</script>";
}
if (($_SESSION['rule'])<>"Dosen"){
    echo "<script>alert('Anda Tidak Bisa Mengakses Halaman Ini'); location.href='login.php';</script>";
  }
?>

<html>
    <head>
        <title>Dashboard Dosen</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body bgcolor="#60a3bc">
    <center style="margin-top:100px; color:#fff; ">
        <h1>Selamat datang, <?php echo $nama; ?></h1>
        <h3>(<?php echo $id; ?>) <?php echo $rule; ?></h3>
    </center>
    <center><a href="logout.php"><button><b>Logout</b></button></a></center>
    </body>
</html>