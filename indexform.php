<?php
$host       = "localhost";
$user       = "id17963523_nawasaktia";
$pass       = "QRkl_j=jRwR/0]q?";
$db         = "id17963523_nawasakti";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nama        = "";
$nik       = "";
$no_kk     = "";
$foto_ktp   = "";
$foto_kk     = "";
$umur    = "";
$kelamin     = "";
$provinsi     = "";
$kab_kota     = "";
$kecamatan     = "";
$kelurahan     = "";
$alamat     = "";
$rt     = "";
$rw     = "";
$psebpan     = "";
$psetpan     = "";
$alasan     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama        = $r1['nama'];
    $nik       = $r1['nik'];
    $no_kk     = $r1['no_kk'];
    $foto_ktp   = $r1['foto_ktp'];
    $foto_kk     = $r1['foto_kk'];
    $umur    = $r1['umur'];
    $kelamin     = $r1['kelamin'];
    $provinsi     = $r1['provinsi'];
    $kab_kota     = $r1['kab_kota'];
    $kecamatan     = $r1['kecamatan'];
    $kelurahan     = $r1['kelurahan'];
    $alamat     = $r1['alamat'];
    $rt     = $r1['rt'];
    $rw     = $r1['rw'];
    $psebpan     = $r1['psebpan'];
    $psetpan     = $r1['psetpan'];
    $alasan     = $r1['alasan'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama        = $_POST['nama'];
    $nik       = $_POST['nik'];
    $no_kk     = $_POST['no_kk'];
    $foto_ktp   = $_POST['foto_ktp'];
    $foto_kk     = $_POST['foto_kk'];
    $umur    = $_POST['umur'];
    $kelamin     = $_POST['kelamin'];
    $provinsi     = $_POST['provinsi'];
    $kab_kota     = $_POST['kab_kota'];
    $kecamatan     = $_POST['kecamatan'];
    $kelurahan     = $_POST['kelurahan'];
    $alamat     = $_POST['alamat'];
    $rt     = $_POST['rt'];
    $rw     = $_POST['rw'];
    $psebpan     = $_POST['psebpan'];
    $psetpan     = $_POST['psetpan'];
    $alasan     = $_POST['alasan'];

    if ($nama && $nik && $no_kk && $foto_ktp && $foto_kk && $umur && $kelamin && $provinsi && $kab_kota && $kecamatan && $kelurahan && $alamat && $rt && $rw && $psebpan && $psetpan && $alasan ) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update mahasiswa set nama = '$nama',nik='$nik',no_kk = '$no_kk',foto_ktp='$foto_ktp',foto_kk='$foto_kk',umur='$umur',kelamin='$kelamin',provinsi='$provinsi',kab_kota='$kab_kota',kecamatan='$kecamatan',kelurahan='$kelurahan',alamat='$alamat',rt='$rt',rw='$rw',psebpan='$psebpan',psetpan='$psetpan',alasan='$alasan' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into mahasiswa(nama,nik,no_kk,foto_ktp,foto_kk,umur,kelamin,provinsi,kab_kota,kecamatan,kelurahan,alamat,rt,rw,psebpan,psetpan,alasan) values ('$nama','$nik','$no_kk','$foto_ktp','$foto_kk','$umur','$kelamin','$provinsi','$kab_kota','$kecamatan','$kelurahan','$alamat','$rt','$rw','$psebpan','$psetpan','$alasan')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
       <marquee><h1>Kementerian Sosial (Kemensos)</h1></marquee> 
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nik" name="nik" value="<?php echo $nik ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_kk" class="col-sm-2 col-form-label">No KK</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="no_kk" name="no_kk" value="<?php echo $no_kk ?>">
                        </div>
                    </div>
                    
                     <div class="mb-3 row">
                        <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="foto_ktp" name="foto_ktp" value="<?php echo $foto_ktp ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto_kk" class="col-sm-2 col-form-label">Foto KK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="foto_kk" name="foto_kk" value="<?php echo $foto_kk ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="umur" name="umur" value="<?php echo $umur ?>">
                        </div>
                    </div>
                    
                     <div class="mb-3 row">
                        <label for="kelamin" class="col-sm-2 col-form-label">Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelamin" name="kelamin" value="<?php echo $kelamin ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo $provinsi ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kab_kota" class="col-sm-2 col-form-label">Kab/Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kab_kota" name="kab_kota" value="<?php echo $kab_kota ?>">
                        </div>
                    </div>
                    
                     <div class="mb-3 row">
                        <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $kecamatan ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $kelurahan ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rt" class="col-sm-2 col-form-label">RT</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="rt" name="rt" value="<?php echo $rt ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rw" class="col-sm-2 col-form-label">RW</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="rw" name="rw" value="<?php echo $rw ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="psebpan" class="col-sm-2 col-form-label">Penghasilan Sebelum Pandemi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="psebpan" name="psebpan" value="<?php echo $psebpan ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="psetpan" class="col-sm-2 col-form-label">Penghasilan Setelah Pandemi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="psetpan" name="psetpan" value="<?php echo $psetpan ?>">
                        </div>
                    </div>
                    
    
                    <div class="mb-3 row">
                        <label for="alasan" class="col-sm-2 col-form-label">Alasan membutuhkan bantuan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="alasan" id="alasan">
                                <option value="">- Pilih  -</option>
                                <option value="Kehilangan pekerjaan" <?php if ($alasan == "Kehilangan pekerjaan") echo "selected" ?>>Kehilangan pekerjaan</option>
                                <option value="Kepala keluarga terdampak atau korban Covid-19" <?php if ($alasan == "Kepala keluarga terdampak atau korban Covid-19") echo "selected" ?>>Kepala keluarga terdampak atau korban Covid-19</option>
                                <option value="Tergolong fakir/miskin semenjak sebelum Covid-19" <?php if ($alasan == "Tergolong fakir/miskin semenjak sebelum Covid-19") echo "selected" ?>>Tergolong fakir/miskin semenjak sebelum Covid-19</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        
            
                <h2><center>Data Penduduk</center></h2>
            </div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">No KK</th>
                            <th scope="col">KTP</th>
                            <th scope="col">KK</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kelurahan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">RT</th>
                            <th scope="col">RW</th>
                            <th scope="col">Penghasilan sebelum pandemi</th>
                            <th scope="col">Penghasilan setelah pandemi</th>
                            <th scope="col">Alasan membutuhkan bantuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from mahasiswa order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nama        = $r2['nama'];
                            $nik       = $r2['nik'];
                            $no_kk     = $r2['no_kk'];
                            $foto_ktp   = $r2['foto_ktp'];
                            $foto_kk     = $r2['foto_kk'];
                            $umur    = $r2['umur'];
                            $kelamin     = $r2['kelamin'];
                            $provinsi     = $r2['provinsi'];
                            $kab_kota     = $r2['kab_kota'];
                            $kecamatan     = $r2['kecamatan'];
                            $kelurahan     = $r2['kelurahan'];
                            $alamat     = $r2['alamat'];
                            $rt     = $r2['rt'];
                            $rw     = $r2['rw'];
                            $psebpan     = $r2['psebpan'];
                            $psetpan     = $r2['psetpan'];
                            $alasan     = $r2['alasan'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $nik ?></td>
                                <td scope="row"><?php echo $no_kk ?></td>
                                <td scope="row"><?php echo $foto_ktp ?></td>
                                <td scope="row"><?php echo $foto_kk ?></td>
                                <td scope="row"><?php echo $umur ?></td>
                                <td scope="row"><?php echo $kelamin ?></td>
                                <td scope="row"><?php echo $provinsi ?></td>
                                <th scope="row"><?php echo $kab_kota ?></th>
                                <td scope="row"><?php echo $kecamatan ?></td>
                                <td scope="row"><?php echo $kelurahan ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $rt ?></td>
                                <td scope="row"><?php echo $rw ?></td>
                                <td scope="row"><?php echo $psebpan ?></td>
                                <td scope="row"><?php echo $psetpan ?></td>
                                <td scope="row"><?php echo $alasan ?></td>
                                
                                
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>