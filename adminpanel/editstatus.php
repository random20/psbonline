<?php
session_start();

include '../config.php';

if (isset($_POST['edit'])) {

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "calonsiswa" | $_SESSION['level'] == "") {
        header("location:gagal_login");
    }else {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $jurusan = $_POST['jurusan'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];
        $ratanilai = $_POST['ratanilai'];
        $statuscs = $_POST['statuscs'];

        $mysqli = "UPDATE pendaftaran SET nama='$nama', nisn='$nisn', jurusan='$jurusan', email='$email', nohp='$nohp', alamat='$alamat', ratanilai='$ratanilai', statuscs='$statuscs' WHERE id='$id'";
        $result = mysqli_query($db, $mysqli);

        if ($result) {
            echo "INPUT BERHASIL";
        } else {
            echo "GAGAL";
        }

        mysqli_close($db);

        header("location:index.php");
    }

} elseif (isset($_POST['hapus'])) {

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "calonsiswa" | $_SESSION['level'] == "") {
        header("location:gagal_login");
    }else {
        $id = $_POST['id'];

        $mysqli = "DELETE FROM pendaftaran WHERE id=$id";
        $query = mysqli_query($db, $mysqli);

        if( $query ){
            header('Location: index.php.php');
        } else {
            die("gagal menghapus...");
        }

        mysqli_close($db);

        header("location:index.php");   
    }

}else {

}

?>