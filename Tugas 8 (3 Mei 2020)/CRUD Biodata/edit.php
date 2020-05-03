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
    
    $sql = "
        UPDATE 
            mahasiswa 
        SET
            nama = '$nama',
            jk = '$jk',
            tmp_lahir = '$tmp_lahir',
            tgl_lahir = '$tgl_lahir',
            alamat = '$alamat',
            agama = '$agama',
            no_telp = '$no_telp',
            fakultas = '$fakultas',
            prodi = '$prodi' 
        WHERE nim = '$nim'  
    ";
    $edit = mysqli_query($koneksi, $sql);  
    if ($edit)
    {
        echo
        "
            <script type='text/javascript'>
                alert('Data telah diedit');
                window.location='index.php';
            </script>
        ";
    }
    else
    {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal diedit');
                window.location='index.php';
            </script>
        ";
    }
?>