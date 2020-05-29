<?php
session_start();

$id     = $_SESSION['idUser'];
$level  = $_SESSION['level'];

if (empty($_SESSION['idUser'])){
  echo "<script>alert('Mohon login terlebih dahulu'); location.href='login.php';</script>";
}

if($level != 'Mahasiswa'){
  echo "<script>alert('Maaf, Anda Tidak Dapat Mengakses Halaman Ini'); location.href='login.php';</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Sistem Informasi Kampus</title>
    <script src="js/jquery.js"></script>
  </head>
  <body>
  <div class="container" style="margin-top:20px;">
        <a href="mhsDashboard.php"><button class="btn btn-warning btn-sm"><b>Dashboard Mahasiswa</b></button></a>
        <a href="mhsKelas.php"><button class="btn btn-warning btn-sm"><b>Kelas</b></button></a>
        <a href="mhsPembimbing.php"><button class="btn btn-warning btn-sm"><b>Pembimbing</b></button></a>
        <a href="mhsViewDosen.php"><button class="btn btn-warning btn-sm"><b>Data Dosen</b></button></a>
        <a href="logout.php"><button class="btn btn-warning btn-sm"><b>Logout</b></button></a>
    </div>
    <div class="container" style="background: #fff; padding: 20px; border-radius: 10px; margin-top: 10px;">
        <h2><b>Dashboard Mahasiswa</b></h2>
        <?php 
            include 'connect.php';
            $getData    = mysqli_query($conn, "SELECT nim, nama, jk, tmp_lahir, tgl_lahir, alamat, agama, no_telp, fakultas, prodi, status_mhs FROM mahasiswa WHERE nim='$id'");
            $data       = mysqli_fetch_array($getData);
            $nim        = $data['nim']; 
            $nama       = $data['nama'];
            $jk         = $data['jk'];
            $tmp_lahir  = $data['tmp_lahir'];
            $tgl_lahir  = $data['tgl_lahir'];
            $alamat     = $data['alamat'];
            $agama      = $data['agama'];
            $no_telp    = $data['no_telp'];
            $fakultas   = $data['fakultas'];
            $prodi      = $data['prodi'];
            $status_mhs = $data['status_mhs'];
        ?>
        <table class="table table-striped">
            <tr>
                <th>NIM</th>
                <td><?php echo $nim; ?></td>
                <th>Agama</th>
                <td><?php echo $agama; ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?php echo $nama; ?></td>
                <th>No Telp</th>
                <td><?php echo $no_telp; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?php echo $jk; ?></td>
                <th>Fakultas</th>
                <td><?php echo $fakultas; ?></td>
            </tr>
            <tr>
                <th>Tempat, Tgl Lahir</th>
                <td><?php echo $tmp_lahir.", ".$tgl_lahir; ?></td>
                <th>Program Studi</th>
                <td><?php echo $prodi; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $alamat; ?></td>
                <th>Status Mahasiswa</th>
                <td><?php echo $status_mhs; ?></td>
            </tr>
            <tr>
                <th></th>
                <td></td>
                <th></th>
                <td><a href="mhsEditProfile.php"><button class="btn btn-primary btn-sm">Edit Profile</button></a></td>
            </tr>
        </table>
        <h2 style="margin-top:10px;"><b>Daftar Kelas</b></h2>
        <form method="post" id="form-daftar-kelas">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php 
                    include "connect.php";
                    $getJml = mysqli_query($conn, "SELECT COUNT(a.id_kelas) AS jml_kelas FROM kelas_mhs a INNER JOIN kelas b ON a.`id_kelas`=b.`id_kelas` WHERE b.`status`='Aktif' AND a.`nim_mhs`='$id'");
                    $dataJml= mysqli_fetch_array($getJml);
                    $jmlKls = $dataJml['jml_kelas'];
                if($jmlKls<5){
                ?>
                <input type="hidden" value="<?php echo $id?>" name="nim_mhs" id="nim_mhs">
                <select class="form-control" name="id_kelas" id="id_kelas">
                    <option value="">--- pilih kelas</option>
                    <?php 
                        $getKelas = mysqli_query($conn, "
                        SELECT 
                        a.id_kelas,
                        a.nama AS nama_kelas,
                        b.nama AS nama_dosen,
                        a.`daya_tampung`
                        FROM
                        kelas a 
                        INNER JOIN dosen b 
                            ON a.`nip_dosen` = b.`nip` 
                        WHERE a.status = 'Aktif' 
                        ");
                        while($data = mysqli_fetch_array($getKelas)){
                            if($data['jumlah_kelas']<$data['daya_tampung']){
                                ?>
                                <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['nama_kelas']. " (".$data['nama_dosen'].")"; ?></option>';
                                <?php 
                            }
                        }
                    ?>
                </select>
                <?php 
                }
                else{
                    echo "Anda tidak bisa mendaftar kelas lagi...";
                }
                ?>
            </div>
            <div class="col-lg-2 col-md-2">
                <button class="btn btn-primary btn-block" type="submit" id="btn-daftar-kelas"><b>Daftar Kelas</b></button>
            </div>
            </form>
        </div>
        <h2 style="margin-top:20px;"><b>Data Kelas</b></h2>
        <table class="table table-striped table-sm table-bordered" style="margin-top:15px;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Dosen</th>
                    <th>Daya Tampung</th>
                    <th>Waktu</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody id="tabel">
                <?php 
                    include "connect.php";
                    $query_mysqli = mysqli_query($conn, "
                    SELECT a.id_kelas, a.nip_dosen, a.nama AS nama_kelas, b.nama, a.daya_tampung, a.waktu, a.keterangan, a.status FROM kelas a INNER JOIN dosen b ON a.`nip_dosen` = b.`nip`
                    ")or die(mysql_error());
                    $nomor = 1;
                    while($data = mysqli_fetch_array($query_mysqli)){
                    $id_kelas = $data['id_kelas'];
                ?>
                <tr>
                    <td align="center" rowspan='2'><?php echo $nomor++; ?></td>
                    <td><?php echo $data['nama_kelas']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td align="center"><?php echo $data['daya_tampung']; ?></td>
                    <td><?php echo $data['waktu']?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                </tr>
                <tr>
                    <td colspan='7'>
                        Mahasiswa terdaftar:
                        <ul>
                        <?php 
                            $getKelas = mysqli_query($conn, "SELECT a.nim_mhs, c.nama, b.nama AS nama_kelas FROM kelas_mhs a INNER JOIN kelas b ON a.`id_kelas`=b.`id_kelas` INNER JOIN mahasiswa c ON a.`nim_mhs`=c.`nim` WHERE a.`id_kelas`='$id_kelas'");
                            $numRow   = mysqli_num_rows($getKelas);
                            if($numRow!=0){
                                while($dataKelas = mysqli_fetch_array($getKelas)){
                                    echo "<li><b>".$dataKelas['nim_mhs']."</b> ".$dataKelas['nama']."</li>";
                                }
                            }
                            else{
                                echo "<i>Masih belum ada yg terdaftar</i>";
                            }
                        ?>
                        </ul>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#btn-daftar-kelas").click(function(){
			var data = $('#form-daftar-kelas').serialize();
			$.ajax({
				type: 'POST',
				url: "mhsSaveKelas.php",
				data: data,
				success: function() {
                    alert("Berhasil mendaftar ke kelas!");
				}
			});
		});
	});
	</script>
  </body>
</html>