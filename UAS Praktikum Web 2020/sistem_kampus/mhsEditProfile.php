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
        </table>
        <h2 style="margin-top:10px;"><b>Edit Data Mahasiswa</b></h2>
        <form method="post" id="form-edit">
        <div class="row" style="margin-top:20px;">
            <div class="col-lg-2 col-md-2"><b>NIM</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM" value="<?php echo $nim; ?>" readonly>
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Nama Mahasiswa</b></div>
            <div class="col-lg-5 col-md-5"><b>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa" value="<?php echo $nama; ?>">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Jenis Kelamin</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <select name="jk" id="jk" class="form-control">
                    <?php 
                        if($jk=="P"){
                            echo "<option value='<?php echo $jk; ?>'>Perempuan</option>";
                        }
                        else{
                            echo "<option value='<?php echo $jk; ?>'>Laki-laki</option>";
                        }
                    ?>
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-laki</option>
                </select>
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Tempat / Tgl Lahir</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo $tmp_lahir; ?>">
            </b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" value="<?php echo $tgl_lahir; ?>">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Alamat Mahasiswa</b></div>
            <div class="col-lg-10 col-md-10"><b>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?php echo $alamat; ?>">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Agama</b></div>
            <div class="col-lg-3 col-md-3"><b>
            <select name="agama" id="agama" class="form-control">
                <option value="<?php echo $agama; ?>"><?php echo $agama; ?></option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Kong Hu Cu">Kong Hu Cu</option>   
                </select>
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>No Telepon</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No Telepon" value="<?php echo $no_telp; ?>">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Fakultas</b></div>
            <div class="col-lg-7 col-md-7"><b>
                <input type="text" name="fakultas" id="fakultas" class="form-control" placeholder="Masukkan Fakultas" value="Fakultas Matematika dan Ilmu Pengetahuan Alam" readonly>
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Program Studi</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="text" name="prodi" id="prodi" class="form-control" placeholder="Masukkan Prodi" value="Informatika" readonly>
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b></b></div>
            <div class="col-lg-3 col-md-3"><b>
                <button type="submit" class="btn btn-primary" id="btn-submit"><b>Simpan Data</b></button>
                <button type="reset" class="btn btn-danger"><b>Bersihkan</b></button>
            </b></div>
        </div>
        </form>
    </div>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#btn-submit").click(function(){
			var data = $('#form-edit').serialize();
			$.ajax({
				type: 'POST',
				url: "updateDataMhs.php",
				data: data,
				success: function() {
					alert("Data Telah Diedit!");
				}
			});
		});
	});
	</script>
  </body>
</html>