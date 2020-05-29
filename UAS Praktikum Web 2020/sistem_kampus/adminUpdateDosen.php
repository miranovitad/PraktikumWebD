<?php 
    include 'connect.php';

    $nip   = $_POST['nip'];
    $status_akun = $_POST['status_akun'];

    $save = mysqli_query($conn, "UPDATE USER SET status_akun='$status_akun' WHERE id='$nip'"); 

    if($save){
        echo"<script> alert('Berhasil mengubah status'); location.href='adminDosen.php';</script>";
    }
    else{
        echo"<script> alert('Gagal mengubah status'); location.href='adminDosen.php';</script>";
    }
?>