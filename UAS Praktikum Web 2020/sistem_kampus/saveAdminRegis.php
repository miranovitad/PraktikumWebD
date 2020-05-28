<?php 
    include 'connect.php';

    $nip    = $_POST['nip'];
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $jk     = $_POST['jk'];
    $no_telp= $_POST['no_telp'];
    $status_admin   = 'Aktif';   
    $password = $_POST['password']; 
    $level  = '1';
    $status_akun    = 'Aktif'

    $sql = "INSERT INTO admin (nip, nama, email, jk, no_telp, status_admin) VALUES (
        '$nip',
        '$nama',
        '$email',
        '$jk',
        '$no_telp',
        '$status_admin'
    )";

    $sql_user = "INSERT INTO user (id, password, level, status_akun) VALUES (
        '$nip',
        '$password',
        '$level',
        '$status_akun'
    )";
    
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql_user);
?>