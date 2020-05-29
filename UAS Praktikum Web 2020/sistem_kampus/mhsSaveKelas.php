<?php 
    include 'connect.php';

    $nim_mhs = $_POST['nim_mhs'];
    $id_kelas= $_POST['id_kelas'];

    mysqli_query($conn, "INSERT INTO kelas_mhs (nim_mhs, id_kelas) VALUES ('$nim_mhs','$id_kelas')"); 

?>