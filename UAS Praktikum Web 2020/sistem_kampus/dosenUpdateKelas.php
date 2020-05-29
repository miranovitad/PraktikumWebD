<?php 
    include 'connect.php';

    $id_kelas   = $_POST['id_kelas'];
    $status     = $_POST['status'];

    $save = mysqli_query($conn, "UPDATE kelas SET STATUS='$status' WHERE id_kelas='$id_kelas'"); 

    if($save){
        echo"<script> alert('Berhasil mengubah status'); location.href='dosenKelas.php';</script>";
    }
    else{
        echo"<script> alert('Gagal mengubah status'); location.href='dosenKelas.php';</script>";
    }
?>