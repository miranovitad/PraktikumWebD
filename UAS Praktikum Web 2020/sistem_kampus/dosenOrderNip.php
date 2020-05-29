<?php 
    include "connect.php";

    $nip    = $_GET['nip'];
    $nama   = $_GET['nama'];
    $jk     = $_GET['jk'];
    $jabatan  = $_GET['jabatan'];
    $cari   = $_GET['cari'];

    if(($nip=="asc")&&($jk=="all")&&($jabatan=="all")){ 
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            ORDER BY nip ASC
        ");
    }
    else if(($nip=="asc")&&($jk=="all")&&($jabatan<>"all")){ 
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            WHERE jabatan = '$jabatan'
            ORDER BY nip ASC
        ");
    }
    else if(($nip=="asc")&&($jk<>"all")&&($jabatan=="all")){ 
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            WHERE jk = '$jk'
            ORDER BY nip ASC
        ");
    }
    else if(($nip=="asc")&&($jk<>"all")&&($jabatan<>"all")){
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            WHERE jk = '$jk' AND jabatan = '$jabatan' 
            ORDER BY nip ASC
        ");
    }
    else if(($nip=="desc")&&($jk=="all")&&($jabatan=="all")){ 
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            ORDER BY nip DESC
        ");
    }
    else if(($nip=="desc")&&($jk=="all")&&($jabatan<>"all")){ 
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            WHERE jabatan = '$jabatan'
            ORDER BY nip DESC
        ");
    }
    else if(($nip=="desc")&&($jk<>"all")&&($jabatan=="all")){ 
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            WHERE jk = '$jk'
            ORDER BY nip DESC
        ");
    }
    else if(($nip=="desc")&&($jk<>"all")&&($jabatan<>"all")){
        $query = mysqli_query($conn, "
            SELECT 
                * 
            FROM
                dosen 
            WHERE jk = '$jk' AND jabatan = '$jabatan' 
            ORDER BY nip DESC
        ");
    }
    else{
        echo "tidak ditemukan";
    }
?>
<?php 
    include "connect.php";
    $nomor = 1;
    while($data = mysqli_fetch_array($query)){
?>
    <tr>
        <td align="center"><?php echo $nomor++; ?></td>
        <td><?php echo $data['nip']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td align="center"><?php echo $data['jk']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['jabatan']; ?></td>
    </tr>
<?php } ?>