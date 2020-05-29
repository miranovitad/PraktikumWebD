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
    <div class="container" style="background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; width:500px;">
    <div id="body">
        <center><h2><b>Login Form</b></h2></center>
        <form method="post" id="form-login" action="actionLogin.php">
        <div class="row" style="margin-top:20px;">
            <div class="col-lg-12 col-md-12"><b>
                <input type="text" name="id" id="id" class="form-control" placeholder="Masukkan NIP/NIM">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-12 col-md-12"><b>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-12 col-md-12"><b>
                <center>
                <button type="submit" class="btn btn-primary" id="btn-submit"><b>Login</b></button>
                <button type="reset" class="btn btn-danger"><b>Batal</b></button>
                </center>
            </b></div>
        </div>
        <div class="row" style="margin-top:10px;">
        <div class="col-lg-12 col-md-12">
            <b><center>
                <a href="adminRegis.php">Registrasi akun admin</a><br>
                <a href="mhsRegis.php">Registrasi akun mahasiswa</a><br>
            </b></center>
        </div>
        </div>
        </form>
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <!-- <script type="text/javascript">
	$(document).ready(function(){
        $("#alert").hide();
		$("#btn-submit").click(function(){
			var data = $('#form-login').serialize();
            $.ajaxSetup({ cache: false });
            e.preventDefault();
			$.ajax({
				type: 'POST',
				url: "actionLogin.php",
				data: data,
				success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        load(mhsRegis.php);
                    }
                    else if(dataResult.statusCode==300){
                        load(mhsRegis.php);
                    }
                    else if(dataResult.statusCode==400){
                        alert("mahasiswa");
                        $('#body').load('mhsDashboard.php');
                    }
                    else if(dataResult.statusCode==500){
                        load(mhsRegis.php);
                    }
                    else{
                        load(mhsRegis.php);
                    }
				}
			});
		});
	});
	</script> -->
  </body>
</html>