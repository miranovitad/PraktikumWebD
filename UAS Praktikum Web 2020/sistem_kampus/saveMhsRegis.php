<?php 
    include 'connect.php';

    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $jk         = $_POST['jk'];
    $tmp_lahir  = $_POST['tmp_lahir'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $alamat     = $_POST['alamat'];
    $agama      = $_POST['agama'];
    $no_telp    = $_POST['no_telp'];
    $fakultas   = $_POST['fakultas'];
    $prodi      = $_POST['prodi'];
    $status_mhs = "Belum Terverifikasi";
    $status_verifikasi = "Belum Terverifikasi";

    $sql = "INSERT INTO mahasiswa (nim, nama, jk, tmp_lahir, tgl_lahir, alamat, agama, no_telp, fakultas, prodi, status_mhs) VALUES (
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
    )";
    
    mysqli_query($conn, $sql);
?>