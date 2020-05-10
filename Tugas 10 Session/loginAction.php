<?php
include "Koneksi.php";

$email		= $_POST['email'];
$password	= $_POST['password'];
$data		= mysqli_query($koneksi, "SELECT id, email, password, nama, rule FROM USER WHERE email='$email' AND PASSWORD='$password'");

$hasil		= mysqli_fetch_array($data);

$hId	    = $hasil['id'];
$hEmail		= $hasil['email'];		
$hPassword	= $hasil['password'];
$hnama		= $hasil['nama'];
$hrule      = $hasil['rule'];

if($hrule=='Mahasiswa'){
	session_start();
	$_SESSION['id']      	= $hId;
	$_SESSION['email']		= $hEmail;
	$_SESSION['password']	= $hPassword;
    $_SESSION['rule']		= $hrule;
    $_SESSION['nama']       = $hnama;
	echo"<script> alert('Selamat Datang Mahasiswa'); location.href='dashboardMahasiswa.php';</script>";
}
else if($hrule=='Dosen'){
	session_start();
	$_SESSION['id']      	= $hId;
	$_SESSION['email']		= $hEmail;
	$_SESSION['password']	= $hPassword;
    $_SESSION['rule']		= $hrule;
    $_SESSION['nama']       = $hnama;
	echo"<script> alert('Selamat Datang Dosen'); location.href='dashboardDosen.php';</script>";
}
else{
	echo"<script> alert('Login Gagal'); </script>";
}
?>	