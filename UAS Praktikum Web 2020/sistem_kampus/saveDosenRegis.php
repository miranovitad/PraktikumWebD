<?php 
    include 'connect.php';
    
    $nip                = $_POST['nip'];
    $nama               = $_POST['nama'];
    $email              = $_POST['email'];
    $jk                 = $_POST['jk'];
    $jabatan            = $_POST['jabatan'];
    $tmp_lahir          = $_POST['tmp_lahir'];
    $tgl_lahir          = $_POST['tgl_lahir'];
    $alamat             = $_POST['alamat'];
    $agama              = $_POST['agama'];
    $no_telp            = $_POST['no_telp'];
    $status_dosen       = 'Aktif';
    $status_verifikasi  = 'Belum Terverifikasi';
    $password           = md5($_POST['password']); 
    $level              = '2';
    
    mysqli_query($conn, "START TRANSACTION;");

    $save_dosen = mysqli_query($conn, "INSERT INTO dosen (nip, nama, email, jk, jabatan, no_telp, alamat, agama, tmp_lahir, tgl_lahir, status_dosen) VALUES (
        '$nip',
        '$nama',
        '$email',
        '$jk',
        '$jabatan',
        '$no_telp',
        '$alamat',
        '$agama',
        '$tmp_lahir',
        '$tgl_lahir',
        '$status_dosen'
    )");

    $save_user = mysqli_query($conn, "INSERT INTO user (id, password, level, status_akun) VALUES (
        '$nip',
        '$password',
        '$level',
        '$status_verifikasi'
    )");

    if ($save_dosen && $save_user) {
        mysqli_query($conn, "COMMIT;");
    } 
    else {
        mysqli_query($conn, "ROLLBACK;");
    }
?>