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

$mysqli = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($db, $mysqli);
$ezi = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) < 1) {
    die("data tidak ditemukan...");
}
?>

<body>
    <div class="menuutama">
        <p class="tulisan_menu" style="color:black;">Informasi Detail Calon Pendaftar</p>

        <form action="edituser.php" method="post" name="menu" style="color:aliceblue;">
            <label>Username</label>
            <br>
            <input type="hidden" name="id" class="form_isian" value="<?php echo $ezi['id'] ?>">
            <input type="text" name="username" class="form_isian" value="<?php echo $ezi['username'] ?>">
            <br>
            <label>Password</label>
            <br>
            <input type="text" name="password" class="form_isian" value="<?php echo $ezi['password'] ?>">
            <br>
            <label>Level</label>
            <br>
            <select name="level" class="form_isian" aria-label=".form-select-sm example">
                <option value="0">Please Select Option</option>
                <option value="calonsiswa" <?php if($ezi['level']=="calonsiswa") echo 'selected="selected"'; ?> >Calon Siswa</option>
                <option value="admin" <?php if($ezi['level']=="admin") echo 'selected="selected"'; ?> >Admin</option>
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