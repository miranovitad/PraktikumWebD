<?php 
    include 'connect.php';

    $nip            = $_POST['nip'];
    $nama           = $_POST['nama'];
    $email          = $_POST['email'];
    $jk             = $_POST['jk'];
    $no_telp        = $_POST['no_telp'];
    $status_admin   = 'Aktif';   
    $password       = md5($_POST['password']); 
    $level          = '1';
    $status_akun    = 'Aktif';

    mysqli_query($conn, "START TRANSACTION;");

    $save_admin = mysqli_query($conn, "INSERT INTO admin (nip, nama, email, jk, no_telp, status_admin) VALUES (
        '$nip',
        '$nama',
        '$email',
        '$jk',
        '$no_telp',
        '$status_admin'
    )");

    $save_user = mysqli_query($conn, "INSERT INTO user (id, password, level, status_akun) VALUES (
        '$nip',
        '$password',
        '$level',
        '$status_akun'
    )");

    if ($save_admin && $save_user) {
        mysqli_query($conn, "COMMIT;");
    } 
    else {
        mysqli_query($conn, "ROLLBACK;");
    }
?>