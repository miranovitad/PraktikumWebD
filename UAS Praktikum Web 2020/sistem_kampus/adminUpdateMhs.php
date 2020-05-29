<?php 
    include 'connect.php';

    $nim   = $_POST['nim'];
    $status_akun = $_POST['status_akun'];

    $save = mysqli_query($conn, "UPDATE USER SET status_akun='$status_akun' WHERE id='$nim'"); 

    if($save){
        echo"<script> alert('Berhasil mengubah status'); location.href='adminDashboard.php';</script>";
    }
    else{
        echo"<script> alert('Gagal mengubah status'); location.href='adminDashboard.php';</script>";
    }
?>