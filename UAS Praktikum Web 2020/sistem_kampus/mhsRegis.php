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
    <div class="container" style="background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px;">
        <h2><b>Registrasi Mahasiswa</b></h2>
        <form method="post" id="form-regis">
        <div class="row" style="margin-top:20px;">
            <div class="col-lg-2 col-md-2"><b>NIM</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Nama Mahasiswa</b></div>
            <div class="col-lg-5 col-md-5"><b>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Jenis Kelamin</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <select name="jk" id="jk" class="form-control">
                    <option value="">--- pilih jenis kelamin</option>
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-laki</option>
                </select>
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Tempat / Tgl Lahir</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
            </b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Alamat Mahasiswa</b></div>
            <div class="col-lg-10 col-md-10"><b>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Agama</b></div>
            <div class="col-lg-3 col-md-3"><b>
            <select name="agama" id="agama" class="form-control">
                <option value="">--- pilih agama</option>
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
                <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No Telepon">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Password</b></div>
            <div class="col-lg-4 col-md-4"><b>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
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
			var data = $('#form-regis').serialize();
			$.ajax({
				type: 'POST',
				url: "saveMhsRegis.php",
				data: data,
				success: function() {
					alert("Registrasi Berhasil! Silahkan tunggu verifikasi");
				}
			});
		});
	});
	</script>
  </body>
</html>