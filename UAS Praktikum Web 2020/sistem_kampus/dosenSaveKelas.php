<?php 
    include 'connect.php';

    $nip_dosen  = $_POST['nip_dosen'];
    $nama       = $_POST['nama'];
    $daya_tampung = $_POST['daya_tampung'];
    $waktu      = $_POST['waktu'];
    $keterangan = $_POST['keterangan'];
    $status     = 'Aktif';

    mysqli_query($conn, "INSERT INTO kelas (nip_dosen, nama, daya_tampung, waktu, keterangan, status) VALUES (
        '$nip_dosen',
        '$nama',
        '$daya_tampung',
        '$waktu',
        '$keterangan',
        '$status'
    )"); 

?>