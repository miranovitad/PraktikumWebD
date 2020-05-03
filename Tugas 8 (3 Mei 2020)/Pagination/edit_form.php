<?php 
    include "koneksi.php";
    $get_nim = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$get_nim'")or die(mysql_error());
    $row = mysqli_fetch_array($query);
    $nim        = $row['nim'];
    $nama       = $row['nama'];
    $jk         = $row['jk'];
    $tmp_lahir  = $row['tmp_lahir'];
    $tgl_lahir  = $row['tgl_lahir'];
    $alamat     = $row['alamat'];
    $agama      = $row['agama'];
    $no_telp    = $row['no_telp'];
    $fakultas   = $row['fakultas'];
    $prodi      = $row['prodi'];
?>
<html>
    <head>
        <title>CRUD Biodata</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <h2>Biodata Mahasiswa</h2>
            <form method="post" action="edit.php">
            <table width=100% class="label">
                <tr>
                    <td width="180px">NIM</td>
                    <td width="280px"><input type="number" class="input-form" name="nim" value="<?php echo $nim; ?>" readonly></td>
                    <td width="10px"></td>
                    <td width="110px">Agama</td>
                    <td>
                        <select name="agama" class="input-form" style="width:120px;">
                            <option value="<?php echo $agama; ?>"><?php echo $agama; ?></option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Kong Hu Cu">Kong Hu Cu</option>    
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" class="input-form" name="nama" style="width:250px" value="<?php echo $nama; ?>"></td>
                    <td></td>
                    <td>No Telp</td>
                    <td><input type="number" class="input-form" name="no_telp" value="<?php echo $no_telp; ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                    <?php 
                        if($jk=="L"){
                            echo "<input type='radio' value='L' name='jk' checked> Laki-laki";
                            echo "<input type='radio' value='P' name='jk'> Perempuan";
                        }
                        else{
                            echo "<input type='radio' value='L' name='jk'> Laki-laki";
                            echo "<input type='radio' value='P' name='jk' checked> Perempuan";
                        }
                    ?>
                    </td>
                    <td></td>
                    <td>Fakultas</td>
                    <td>
                        <select name="fakultas" class="input-form" style="width:300px;">
                            <option value="<?php echo $fakultas; ?>"><?php echo $fakultas; ?></option>
                            <option value="FIB">FIB</option> 
                            <option value="FK">FK</option> 
                            <option value="FH">FH</option> 
                            <option value="FT">FT</option> 
                            <option value="FP">FP</option> 
                            <option value="FEB">FEB</option> 
                            <option value="FAPET">FAPET</option> 
                            <option value="FMIPA">FMIPA</option> 
                            <option value="FKH">FKH</option> 
                            <option value="FTP">FTP</option> 
                            <option value="FPAR">FPAR</option> 
                            <option value="FISIP">FISIP</option> 
                            <option value="FKP">FKP</option>  
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>
                        <input type="text" class="input-form" name="tmp_lahir" style="width:120px" value="<?php echo $tmp_lahir; ?>">
                        <input type="date" class="input-form" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>">
                    </td>
                    <td></td>
                    <td>Prodi</td>
                    <td><input type="text" class="input-form" name="prodi" style="width:275px" value="<?php echo $prodi; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" class="input-form" name="alamat" style="width:275px" value="<?php echo $alamat; ?>"></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn-simpan">Edit</button>
                    </td>
                </tr>
            </table>
            </form>
            <table border="1" width="100%" class="tabel">
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
                    <th>Aksi</th>
                </tr>
                <?php 
                    include "koneksi.php";
                    $query_mysqli = mysqli_query($koneksi, "SELECT * FROM mahasiswa")or die(mysql_error());
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
                    <td width="75px" align="center">
                        <a class="edit" href="edit_form.php?id=<?php echo $data['nim']; ?>">Edit</a>
                        <a class="hapus" href="hapus.php?id=<?php echo $data['nim']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>					
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>