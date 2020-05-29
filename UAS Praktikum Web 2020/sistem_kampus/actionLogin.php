<?php 
    include 'connect.php';
    
    $id         = $_POST['id'];
    $password   = $_POST['password'];

    $pass       = md5($password);

    $getDataLevel   = mysqli_query($conn, "SELECT a.id, b.nama_level, a.`status_akun` FROM USER a INNER JOIN LEVEL b ON a.`level`=b.`id_level` WHERE a.`id`='$id' AND a.`password`='$pass'");
    $dataLevel      = mysqli_fetch_array($getDataLevel);
    $namaLevel      = $dataLevel['nama_level'];
    $id             = $dataLevel['id'];
    $statusAkun     = $dataLevel['status_akun'];

    if($statusAkun=="Aktif"){
        if($namaLevel=="Admin"){
            session_start();
            $_SESSION['idUser'] 	= $id;
            $_SESSION['level']      = $namaLevel;
            // echo json_encode(array("statusCode"=>200));
            echo"<script> alert('Selamat datang Admin'); location.href='adminDashboard.php';</script>";
        }
        else if ($namaLevel=="Dosen"){
            session_start();
            $_SESSION['idUser'] 	= $id;
            $_SESSION['level']      = $namaLevel;
            // echo json_encode(array("statusCode"=>300));
            echo"<script> alert('Selamat datang Dosen'); location.href='dosenDashboard.php';</script>";
        }
        else if($namaLevel=="Mahasiswa"){
            session_start();
            $_SESSION['idUser'] 	= $id;
            $_SESSION['level']      = $namaLevel;
            // echo json_encode(array("statusCode"=>400));
            echo"<script> alert('Selamat datang Mahasiswa'); location.href='mhsDashboard.php';</script>";
        }
        else{
            echo"<script> alert('Akun ada belum aktif, silahkan hubungi admin untuk melakukan verifikasi'); location.href='index.php';</script>";
        }
    }
    else{
        echo"<script> alert('Login gagal!, silahkan cek id dan password Anda!'); location.href='index.php';</script>";
    }
    
?>