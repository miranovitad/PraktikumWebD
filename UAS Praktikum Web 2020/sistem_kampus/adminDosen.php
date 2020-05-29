<?php
session_start();

$id     = $_SESSION['idUser'];
$level  = $_SESSION['level'];

if (empty($_SESSION['idUser'])){
  echo "<script>alert('Mohon login terlebih dahulu'); location.href='login.php';</script>";
}

if($level != 'Admin'){
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
        <a href="dosenRegis.php"><button class="btn btn-warning btn-sm"><b>Registrasi Dosen</b></button></a>
        <a href="adminDashboard.php"><button class="btn btn-warning btn-sm"><b>Data Mahasiswa</b></button></a>
        <a href="adminDosen.php"><button class="btn btn-warning btn-sm"><b>Data Dosen</b></button></a>
        <a href="logout.php"><button class="btn btn-warning btn-sm"><b>Logout</b></button></a>
    </div>
    <div class="container" style="background: #fff; padding: 20px; border-radius: 10px; margin-top: 10px;">
    <h2><b>Dashboard Admin</b></h2>
        <?php 
            include 'connect.php';
            $getData    = mysqli_query($conn, "SELECT nip, nama, email, jk, no_telp, status_admin FROM admin WHERE nip='$id'");
            $data       = mysqli_fetch_array($getData);
            $nip        = $data['nip']; 
            $nama       = $data['nama'];
            $email      = $data['email'];
            $jk         = $data['jk'];
            $no_telp    = $data['no_telp'];
            $status_admin = $data['status_admin'];
        ?>
        <table class="table table-striped">
            <tr>
                <th>NIP</th>
                <td><?php echo $nip; ?></td>
                <th>Email</th>
                <td><?php echo $email; ?></td>
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
                <th>Status</th>
                <td><?php echo $status_admin; ?></td>
            </tr>
        </table>
        <h2 style="margin-top:10px;"><b>Data Dosen</b></h2>
        <table class="table table-striped table-sm table-bordered" style="margin-top:15px;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Email</th>
                    <th>Jabatan Terakhir</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody id="tabel">
                <?php 
                    include "connect.php";
                    $query_mysqli = mysqli_query($conn, "SELECT * FROM dosen ")or die(mysql_error());
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
                    <?php $nip = $data['nip']; ?>
                    <td>
                    <form method="post" id="form-ubah-mhs" action="adminUpdateDosen.php">
                        <input type="hidden" name="nip" id="nip" value="<?php echo $nip; ?>">
                        <?php 
                          $getUser = mysqli_query($conn, "SELECT status_akun FROM USER WHERE id='$nip' AND level='2'");
                          $dataUser = mysqli_fetch_array($getUser);
                        ?>
                        <select class="form-control" name="status_akun" id="status_akun">
                            <option value="<?php echo $dataUser['status_akun']; ?>"><?php echo $dataUser['status_akun']; ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Mutasi">Mutasi</option>
                            <option value="Putus Kontrak">Putus Kontrak</option>
                        </select>
                        <button type="submit" id="btn-ubah-mhs" class="btn btn-primary btn-sm" style="margin-top:3px;">Ubah</button>
                    </form>
                    </td>
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