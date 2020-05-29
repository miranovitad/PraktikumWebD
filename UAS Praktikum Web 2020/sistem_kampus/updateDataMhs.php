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

    mysqli_query($conn, "UPDATE 
        mahasiswa 
    SET
        nama = '$nama',
        jk = '$jk',
        tmp_lahir = '$tmp_lahir',
        tgl_lahir = '$tgl_lahir',
        alamat='$alamat',
        agama='$agama',
        no_telp='$no_telp'
    WHERE nim = '$nim'");
?>