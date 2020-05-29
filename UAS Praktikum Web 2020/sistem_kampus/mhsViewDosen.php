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
  <div class="container" style="margin-top:10px;">
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
        <h2 style="margin-top:10px;"><b>Data Dosen</b></h2>
        <div class="row">
            <div class="col-lg-3 col-md-3">
            <b>NIP</b>
                        <select id="nip" class="form-control">
                            <option value="asc">--- sorting by nip</option>
                            <option value="asc">Urutkan ascending</option>
                            <option value="desc">Urutkan descending</option>
                        </select>
            </div>
            <div class="col-lg-3 col-md-3">
            <b>Nama</b>
                <select id="nama" class="form-control">
                    <option value="asc">--- sorting by nama</option>
                    <option value="asc">Urutkan dari a-z</option>
                    <option value="desc">Urutkan dari z-a</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-3">
            <b>Jenis Kelamin</b>
                <select id="jk" class="form-control">
                    <option value="all">--- filter by jk</option>
                    <option value="p">Perempuan</option>
                    <option value="l">Laki-laki</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-3">
            <b>Jabatan Terakhir</b>
                        <select id="jabatan" class="form-control">
                            <option value="all">--- filter by jabatan</option>
                            <option value="LEKTOR">LEKTOR</option>
                            <option value="LEKTOR KEPALA">LEKTOR KEPALA</option>
                            <option value="ASISTEN AHLI">ASISTEN AHLI</option>
                            <option value="TENAGA PENGAJAR">TENAGA PENGAJAR</option> 
                        </select>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-12 col-md-12">
                <b>Pencarian</b>
                <input type="text" class="form-control" id="cari" placeholder="Cari nama/nim">
            </div>
        </div>
        <table class="table table-striped table-sm table-bordered" style="margin-top:15px;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Email</th>
                    <th>Jabatan Terakhir</th>
                </tr>
                </thead>
                <tbody id="tabel">
                <?php 
                    include "connect.php";
                    $query_mysqli = mysqli_query($conn, "SELECT * FROM dosen")or die(mysql_error());
                    $nomor = 1;
                    while($data = mysqli_fetch_array($query_mysqli)){
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
                </tbody>
            </table>
    </div>
    <script src="js/jquery.js"></script>
    <!-- Pencarian -->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#cari").keyup(function() {
          var cari  = $("#cari").val(); 
          var nip   = $("#nip").val(); 
          var jk    = $("#jk").val();
          var jabatan = $("#jabatan").val();
          var nama  = $("#nama").val();
          if (cari != ""){
            $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>") 
            $.ajax({
              type:"get",
              url:"dosenKeyup.php",
              data:"cari="+cari+"&nip="+nip+"&jk="+jk+"&jabatan="+jabatan+"&nama="+nama,
              success: function(data){
                $("#tabel").html(data);
              }
            });
          }
          else
          {
            $.ajax({
              url:"dosenKeyup.php",
              data:"cari="+cari+"&nip="+nip+"&jk="+jk+"&jabatan="+jabatan+"&nama="+nama,
              cache: false,
              success: function(msg){
                $("#tabel").html(msg);
              }
            });
          }
        });
      });
    </script>
    <!-- Filter -->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#jabatan, #jk").change(function() {
          var cari  = $("#cari").val(); 
          var nip   = $("#nip").val(); 
          var jk    = $("#jk").val();
          var jabatan = $("#jabatan").val();
          var nama  = $("#nama").val();
          $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>")  
          $.ajax({
              type:"get",
              url:"dosenChangeFilter.php",
              data:"cari="+cari+"&nip="+nip+"&jk="+jk+"&jabatan="+jabatan+"&nama="+nama,
              success: function(data){
                $("#tabel").html(data);
              }
            });
          });
      });
    </script>
    <!-- Sorting Nama -->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#nama").change(function() {
          var cari  = $("#cari").val(); 
          var nip   = $("#nip").val(); 
          var jk    = $("#jk").val();
          var jabatan = $("#jabatan").val();
          var nama  = $("#nama").val();
          $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>")  
          $.ajax({
              type:"get",
              url:"dosenOrderNama.php",
              data:"cari="+cari+"&nip="+nip+"&jk="+jk+"&jabatan="+jabatan+"&nama="+nama,
              success: function(data){
                $("#tabel").html(data);
              }
            });
          });
      });
    </script>
    <!-- Sorting Nip -->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#nip").change(function() {
          var cari  = $("#cari").val(); 
          var nip   = $("#nip").val(); 
          var jk    = $("#jk").val();
          var jabatan = $("#jabatan").val();
          var nama  = $("#nama").val();
          $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>")  
          $.ajax({
              type:"get",
              url:"dosenOrderNip.php",
              data:"cari="+cari+"&nip="+nip+"&jk="+jk+"&jabatan="+jabatan+"&nama="+nama,
              success: function(data){
                $("#tabel").html(data);
              }
            });
          });
      });
    </script>
  </body>
</html>