<!DOCTYPE html>
<html>

<head>
    <title>PENDAFTARAN</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "admin" | $_SESSION['level'] == "") {
    header("location:gagal_login");
}

?>

<body>
    <div class="menuutama">
        <p class="tulisan_menu">PENDAFTARAN SISWA BARU</p>

        <form action="inputpendaftaran.php" method="post" name="menu">
            <label>Nama</label>
            <br>
            <input type="text" name="nama" class="form_isian" placeholder="nama anda">
            <br>
            <label>NISN</label>
            <br>
            <input type="text" name="nisn" class="form_isian" placeholder="NISN anda">
            <br>
            <label>Jurusan</label>
            <br>
            <input type="text" name="jurusan" class="form_isian" placeholder="jurusan Anda">
            <br>
            <label>Email</label>
            <br>
            <input type="text" name="email" class="form_isian" placeholder="EMAIL">
            <br>
            <label>NoHp</label>
            <br>
            <input type="text" name="nohp" class="form_isian" placeholder="NO HP">
            <br>
            <label>Alamat</label>
            <br>
            <input type="text" name="alamat" class="form_isian" placeholder="Alamat Anda">
            <br>
            <label>Nilai Rata-Rata</label>
            <br>
            <input type="text" name="ratanilai" class="form_isian" placeholder="Nilai Rata - Rata (ex : 85.5)">
            <br>

            <input type="submit" class="tombol_submit" value="SUBMIT">

            <br />
            <br />
            <center>
                <a class="link" href="index.php">kembali</a>
            </center>
        </form>
    </div>
</body>

</html>