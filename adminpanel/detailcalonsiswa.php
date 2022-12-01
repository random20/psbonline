<!DOCTYPE html>
<html>

<head>
    <title>Detail Pendaftar</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "calonsiswa" | $_SESSION['level'] == "") {
    header("location:gagal_login");
}

?>

<?php
include('../config.php');

if (!isset($_GET['id'])) {
    header('Location: informasipendaftar.php');
}

$id = $_GET['id'];

$mysqli = "SELECT * FROM pendaftaran WHERE id=$id";
$result = mysqli_query($db, $mysqli);
$ezi = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) < 1) {
    die("data tidak ditemukan...");
}
?>

<body>
    <div class="menuutama">
        <p class="tulisan_menu" style="color:black;">Informasi Detail Calon Pendaftar</p>

        <form action="editstatus.php" method="post" name="menu" style="color:aliceblue;">
            <label>Nama</label>
            <br>
            <input type="hidden" name="id" class="form_isian" value="<?php echo $ezi['id'] ?>">
            <input type="text" name="nama" class="form_isian" value="<?php echo $ezi['nama'] ?>">
            <br>
            <label>NISN</label>
            <br>
            <input type="text" name="nisn" class="form_isian" value="<?php echo $ezi['nisn'] ?>">
            <br>
            <label>Jurusan</label>
            <br>
            <input type="text" name="jurusan" class="form_isian" value="<?php echo $ezi['jurusan'] ?>">
            <br>
            <label>Email</label>
            <br>
            <input type="text" name="email" class="form_isian" value="<?php echo $ezi['email'] ?>">
            <br>
            <label>NoHp</label>
            <br>
            <input type="text" name="nohp" class="form_isian" value="<?php echo $ezi['nohp'] ?>">
            <br>
            <label>Alamat</label>
            <br>
            <input type="text" name="alamat" class="form_isian" value="<?php echo $ezi['alamat'] ?>">
            <br>
            <label>Nilai Rata-Rata</label>
            <br>
            <input type="text" name="ratanilai" class="form_isian" value="<?php echo $ezi['ratanilai'] ?>">
            <br>
            <label>Status Calon Siswa</label>
            <br>
            <select name="statuscs" class="form_isian" aria-label=".form-select-sm example">
                <option value="0">Please Select Option</option>
                <option value="diterima" <?php if($ezi['statuscs']=="diterima") echo 'selected="selected"'; ?> >Diterima</option>
                <option value="cadangan" <?php if($ezi['statuscs']=="cadangan") echo 'selected="selected"'; ?> >Cadangan</option>
                <option value="tidakditerima" <?php if($ezi['statuscs']=="tidakditerima") echo 'selected="selected"'; ?> >Tidak Diterima</option>
            </select>
            <br>
            
            <input type="submit" class="tombol_submit" name="edit" value="edit">
            <br />
            <br />
            <input type="submit" class="tombol_submit" name="hapus" value="hapus">


            <br />
            <br />
            <center>
                <a class="link" href="index.php">kembali</a>
            </center>
        </form>
    </div>
</body>

</html>