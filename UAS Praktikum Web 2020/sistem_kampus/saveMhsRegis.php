<?php 
    include 'connect.php';

    $nim                = $_POST['nim'];
    $nama               = $_POST['nama'];
    $jk                 = $_POST['jk'];
    $tmp_lahir          = $_POST['tmp_lahir'];
    $tgl_lahir          = $_POST['tgl_lahir'];
    $alamat             = $_POST['alamat'];
    $agama              = $_POST['agama'];
    $no_telp            = $_POST['no_telp'];
    $fakultas           = $_POST['fakultas'];
    $prodi              = $_POST['prodi'];
    $status_mhs         = 'Aktif';
    $status_verifikasi  = 'Belum Terverifikasi';
    $password           = md5($_POST['password']); 
    $level              = '3';

    mysqli_query($conn, "START TRANSACTION;");

    $save_mhs = mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jk, tmp_lahir, tgl_lahir, alamat, agama, no_telp, fakultas, prodi, status_mhs) VALUES (
        '$nim',
        '$nama',
        '$jk',
        '$tmp_lahir',
        '$tgl_lahir',
        '$alamat',
        '$agama',
        '$no_telp',
        '$fakultas',
        '$prodi',
        '$status_mhs'
    )");

    $save_user = mysqli_query($conn, "INSERT INTO user (id, password, level, status_akun) VALUES (
        '$nim',
        '$password',
        '$level',
        '$status_verifikasi'
    )");
    
    if ($save_mhs && $save_user) {
        mysqli_query($conn, "COMMIT;");
    } 
    else {
        mysqli_query($conn, "ROLLBACK;");
    }
?>