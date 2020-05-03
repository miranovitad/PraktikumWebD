<html>
    <head>
        <title>CRUD Biodata</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <h2>Biodata Mahasiswa</h2>
            <form method="post" action="simpan.php">
            <table width=100% class="label">
                <tr>
                    <td width="180px">NIM</td>
                    <td width="280px"><input type="number" class="input-form" name="nim"></td>
                    <td width="10px"></td>
                    <td width="110px">Agama</td>
                    <td>
                        <select name="agama" class="input-form" style="width:120px;">
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
                    <td><input type="text" class="input-form" name="nama" style="width:250px"></td>
                    <td></td>
                    <td>No Telp</td>
                    <td><input type="number" class="input-form" name="no_telp"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" value="P" name="jk"> Perempuan
                        <input type="radio" value="L" name="jk"> Laki-laki
                    </td>
                    <td></td>
                    <td>Fakultas</td>
                    <td>
                        <select name="fakultas" class="input-form" style="width:300px;">
                            <option value="FIB">Fakultas Ilmu Budaya</option> 
                            <option value="FK">Fakultas Kedokteran</option> 
                            <option value="FH">Fakultas Hukum</option> 
                            <option value="FT">Fakultas Teknik</option> 
                            <option value="FP">Fakultas Pertanian</option> 
                            <option value="FEB">Fakultas Ekonomi dan Bisnis</option> 
                            <option value="FAPET">Fakultas Peternakan</option> 
                            <option value="FMIPA">Fakultas Matematika dan Ilmu Pengetahuan Alam</option> 
                            <option value="FKH">Fakultas Kedokteran Hewan</option> 
                            <option value="FTP">Fakultas Teknologi Pertanian</option> 
                            <option value="FPAR">Fakultas Pariwisata</option> 
                            <option value="FISIP">Fakultas Ilmu Sosial dan Ilmu Politik</option> 
                            <option value="FKP">Fakultas Kelautan dan Perikanan</option>  
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>
                        <input type="text" class="input-form" name="tmp_lahir" style="width:120px">
                        <input type="date" class="input-form" name="tgl_lahir">
                    </td>
                    <td></td>
                    <td>Prodi</td>
                    <td><input type="text" class="input-form" name="prodi" style="width:275px"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" class="input-form" name="alamat" style="width:275px"></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn-simpan">Simpan</button>
                        <button type="reset" class="btn-simpan">Reset</button>
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