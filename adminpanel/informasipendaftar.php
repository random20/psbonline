<!DOCTYPE html>
<html>

<head>
    <title>statuscs Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "calonsiswa" | $_SESSION['level'] == "") {
    header("location:gagal_login");
}

?>

<body>
    <div class="datadaftar">
        <p class="tulisan_menu" style="color:aqua;">statuscs Pendaftaran</p>
        <br>
        <br>

        <table border="1" align="center">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>nisn</th>
                <th>jurusan</th>
                <th>rata-rata nilai</th>
                <th>Status Pendaftaran</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                include '../config.php';
                $no = 1;
                $sql = mysqli_query($db, "SELECT * FROM pendaftaran");
                while ($query = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $query['nama']; ?></td>
                        <td><?php echo $query['nisn']; ?></td>
                        <td><?php echo $query['jurusan']; ?></td>
                        <td><?php echo $query['ratanilai']; ?></td>
                        <td><?php echo $query['statuscs']; ?></td>
                        <td>
                            <a href="detailcalonsiswa.php?id=<?php echo $query['id']; ?>" class="tomboltabel">DETAIL</a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>