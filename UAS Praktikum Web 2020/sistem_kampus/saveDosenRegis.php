<?php 
    include 'connect.php';
    
    $nip        = $_POST['nip'];
    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $jk         = $_POST['jk'];
    $jabatan    = $_POST['jabatan'];
    $tmp_lahir  = $_POST['tmp_lahir'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $alamat     = $_POST['alamat'];
    $agama      = $_POST['agama'];
    $no_telp    = $_POST['no_telp'];
    $status_dosen = "Belum Terverifikasi";
    $status_verifikasi = "Belum Terverifikasi";
    
    $sql = "
    
    INSERT INTO dosen (nip, nama, email, jk, jabatan, no_telp, alamat, agama, tmp_lahir, tgl_lahir, status_dosen) VALUES (
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
    )";

    mysqli_query($conn, $sql);
?>