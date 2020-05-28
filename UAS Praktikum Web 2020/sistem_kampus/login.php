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
        <h2><b>Registrasi Admin</b></h2>
        <div class="alert alert-primary" role="alert" id="alert">
            A simple primary alert—check it out!
        </div>
        <form method="post" id="form-regis">
        <div class="row" style="margin-top:20px;">
            <div class="col-lg-2 col-md-2"><b>NIP</b></div>
            <div class="col-lg-3 col-md-3"><b>
                <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Nama Admin</b></div>
            <div class="col-lg-5 col-md-5"><b>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Admin">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2 col-md-2"><b>Email</b></div>
            <div class="col-lg-5 col-md-5"><b>
                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email Admin">
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
        $("#alert").hide();
		$("#btn-submit").click(function(){
			var data = $('#form-regis').serialize();
			$.ajax({
				type: 'POST',
				url: "saveAdminRegis.php",
				data: data,
				success: function() {
                    alert("Registrasi Berhasil! Anda bisa login dengan nip dan password");
				}
			});
		});
	});
	</script>
  </body>
</html>