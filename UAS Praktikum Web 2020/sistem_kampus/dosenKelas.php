<?php
session_start();

$id     = $_SESSION['idUser'];
$level  = $_SESSION['level'];

if (empty($_SESSION['idUser'])){
  echo "<script>alert('Mohon login terlebih dahulu'); location.href='login.php';</script>";
}

if($level != 'Dosen'){
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
  </head>
  <body>
  <div class="container" style="margin-top:10px;">
        <a href="dosenDashboard.php"><button class="btn btn-warning btn-sm"><b>Dashboard Dosen</b></button></a>
        <a href="dosenKelas.php"><button class="btn btn-warning btn-sm"><b>Kelas</b></button></a>
        <a href="logout.php"><button class="btn btn-warning btn-sm"><b>Logout</b></button></a>
    </div>
    <div class="container" style="background: #fff; padding: 20px; border-radius: 10px; margin-top: 10px;">
    <h2><b>Dashboard Dosen</b></h2>
        <?php 
            include 'connect.php';
            $getData    = mysqli_query($conn, "SELECT nip, nama, email, jk, jabatan, no_telp, alamat, agama, tmp_lahir, tgl_lahir, status_dosen FROM dosen WHERE nip='$id'");
            $data       = mysqli_fetch_array($getData);
            $nip        = $data['nip']; 
            $nama       = $data['nama'];
            $jk         = $data['jk'];
            $tmp_lahir  = $data['tmp_lahir'];
            $tgl_lahir  = $data['tgl_lahir'];
            $alamat     = $data['alamat'];
            $agama      = $data['agama'];
            $no_telp    = $data['no_telp'];
            $email      = $data['email'];
            $jabatan    = $data['jabatan'];
            $status_dosen = $data['status_dosen'];
        ?>
        <table class="table table-striped">
            <tr>
                <th>NIP</th>
                <td><?php echo $nip; ?></td>
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
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Tempat, Tgl Lahir</th>
                <td><?php echo $tmp_lahir.", ".$tgl_lahir; ?></td>
                <th>Jabatan</th>
                <td><?php echo $jabatan; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $alamat; ?></td>
                <th>Status Dosen</th>
                <td><?php echo $status_dosen; ?></td>
            </tr>
        </table>
        <h2 style="margin-top:10px;"><b>Tambah Kelas</b></h2>
        <form method="post" id="form-tambah-kelas">
            <div class="row">
                <input type="hidden" name="nip_dosen" id="nip_dosen" value="<?php echo $id; ?>">
                <div class="col-lg-4 col-md-4">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama kelas">
                </div>
                <div class="col-lg-2 col-md-2">
                    <input type="text" name="daya_tampung" id="daya_tampung" class="form-control" placeholder="Daya tampung">
                </div>
                <div class="col-lg-3 col-md-3">
                    <input type="text" name="waktu" id="waktu" class="form-control" placeholder="Hari, jam">
                </div>
                <div class="col-lg-3 col-md-3">
                    <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
                </div>
            </div>
            <div class="row" style="margin-top:10px; ">
                <div class="col-lg-2 col-md-2">
                    <button class="btn btn-primary btn-block" type="submit" id="btn-tambah-kelas"><b>Tambah Kelas</b></button>
                </div>
            </div>
        </form>
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
                    SELECT a.id_kelas, a.nip_dosen, a.nama AS nama_kelas, b.nama, a.daya_tampung, a.waktu, a.keterangan, a.status FROM kelas a INNER JOIN dosen b ON a.`nip_dosen` = b.`nip` where a.nip_dosen='$id'
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
                    <td>
                    <form method="post" id="form-ubah-status" action="dosenUpdateKelas.php">
                        <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $id_kelas; ?>">
                        <select class="form-control" name="status" id="status">
                            <option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <button type="submit" id="btn-ubah-status" class="btn btn-primary btn-sm" style="margin-top:3px;">Ubah</button>
                    </form>
                    </td>
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
    <script src="js/jquery.js"></script>
    <!-- <script type="text/javascript">
	$(document).ready(function(){
		$("#btn-ubah-status").click(function(){
			var data = $('#form-ubah-status').serialize();
			$.ajax({
				type: 'POST',
				url: "dosenUpdateKelas.php",
				data: data,
				success: function() {
                    alert("Berhasil mengupdate kelas!");
				}
			});
		});
	});
	</script> -->
    <script type="text/javascript">
	$(document).ready(function(){
		$("#btn-tambah-kelas").click(function(){
			var data = $('#form-tambah-kelas').serialize();
			$.ajax({
				type: 'POST',
				url: "dosenSaveKelas.php",
				data: data,
				success: function() {
                    alert("Berhasil menambahkan kelas!");
				}
			});
		});
	});
	</script>
  </body>
</html>