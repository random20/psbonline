<?php

session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "admin" | $_SESSION['level'] == "") {
    header("location:gagal_login");
}else{
    include '../config.php';

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $ratanilai = $_POST['ratanilai'];

    $mysqli = "INSERT INTO pendaftaran (nama, nisn, jurusan, email, nohp, alamat, ratanilai) VALUES ('$nama', '$nisn', '$jurusan', '$email', '$nohp', '$alamat', '$ratanilai')";

    $result = mysqli_query($db, $mysqli);

    header("location:index.php");
}



?>