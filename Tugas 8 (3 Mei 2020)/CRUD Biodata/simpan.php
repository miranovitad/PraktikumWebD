<?php 
    include 'koneksi.php';
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
     
    $sql = "INSERT INTO mahasiswa (nim, nama, jk, tmp_lahir, tgl_lahir, alamat, agama, no_telp, fakultas, prodi) VALUES (
        '$nim',
        '$nama',
        '$jk',
        '$tmp_lahir',
        '$tgl_lahir',
        '$alamat',
        '$agama',
        '$no_telp',
        '$fakultas',
        '$prodi'
    )";
    $simpan = mysqli_query($koneksi, $sql);  
    if ($simpan)
    {
        echo
        "
            <script type='text/javascript'>
                alert('Data telah disimpan');
                window.location='index.php';
            </script>
        ";
    }
    else
    {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal disimpan');
                window.location='index.php';
            </script>
        ";
    }
?>