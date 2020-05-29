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
        <h2 style="margin-top:10px;"><b>Data Mahasiswa</b></h2>
        <div class="row">
            <div class="col-lg-3 col-md-3">
            <b>NIM</b>
                <select id="nim" class="form-control">
                    <option value="asc">--- sorting by nim</option>
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
            <b>Agama</b>
                <select id="agama" class="form-control">
                    <option value="all">--- filter by agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Kong Hu Cu">Kong Hu Cu</option>   
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
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>No Telp</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                </tr>
                </thead>
                <tbody id="tabel">
                <?php 
                    include "connect.php";
                    $query_mysqli = mysqli_query($conn, "SELECT * FROM mahasiswa")or die(mysql_error());
                    $nomor = 1;
                    while($data = mysqli_fetch_array($query_mysqli)){
                ?>
                <tr>
                    <td align="center"><?php echo $nomor++; ?></td>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td align="center"><?php echo $data['jk']; ?></td>
                    <td><?php echo $data['tmp_lahir'].", ".$data['tgl_lahir'];; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['agama']; ?></td>
                    <td><?php echo $data['no_telp']; ?></td>
                    <td><?php echo $data['fakultas']; ?></td>
                    <td><?php echo $data['prodi']; ?></td>
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
          var nim   = $("#nim").val(); 
          var jk    = $("#jk").val();
          var agama = $("#agama").val();
          var nama  = $("#nama").val();
          if (cari != ""){
            $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>") 
            $.ajax({
              type:"get",
              url:"mhsKeyup.php",
              data:"cari="+cari+"&nim="+nim+"&jk="+jk+"&agama="+agama+"&nama="+nama,
              success: function(data){
                $("#tabel").html(data);
              }
            });
          }
          else
          {
            $.ajax({
              url:"mhsKeyup.php",
              data:"cari="+cari+"&nim="+nim+"&jk="+jk+"&agama="+agama+"&nama="+nama,
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
        $("#agama, #jk").change(function() {
          var cari  = $("#cari").val(); 
          var nim   = $("#nim").val(); 
          var jk    = $("#jk").val();
          var agama = $("#agama").val();
          var nama  = $("#nama").val();
          $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>")  
          $.ajax({
              type:"get",
              url:"mhsChangeFilter.php",
              data:"cari="+cari+"&nim="+nim+"&jk="+jk+"&agama="+agama+"&nama="+nama,
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
          var nim   = $("#nim").val(); 
          var jk    = $("#jk").val();
          var agama = $("#agama").val();
          var nama  = $("#nama").val();
          $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>")  
          $.ajax({
              type:"get",
              url:"mhsOrderNama.php",
              data:"cari="+cari+"&nim="+nim+"&jk="+jk+"&agama="+agama+"&nama="+nama,
              success: function(data){
                $("#tabel").html(data);
              }
            });
          });
      });
    </script>
    <!-- Sorting Nim -->
    <script type="text/javascript">
      $(document).ready(function() {
        $("#nim").change(function() {
          var cari  = $("#cari").val(); 
          var nim   = $("#nim").val(); 
          var jk    = $("#jk").val();
          var agama = $("#agama").val();
          var nama  = $("#nama").val();
          $("#tabel").html("<tr><td colspan=10><img src='img/loading.gif'/></td></tr>")  
          $.ajax({
              type:"get",
              url:"mhsOrderNim.php",
              data:"cari="+cari+"&nim="+nim+"&jk="+jk+"&agama="+agama+"&nama="+nama,
              success: function(data){
                $("#tabel").html(data);
              }
            });
          });
      });
    </script>
  </body>
</html>