<?php
	include "koneksi.php";
 
	$nim = $_GET["id"];
 
	$sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
	$query = mysqli_query($koneksi, $sql) or die (mysqli_error());
 
	if ($query)
    {
        echo
        "
            <script type='text/javascript'>
                alert('Data telah dihapus');
                window.location='index.php';
            </script>
        ";
    }
    else
    {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal dihapus');
                window.location='index.php';
            </script>
        ";
    }
 
	mysqli_close($koneksi);
?>