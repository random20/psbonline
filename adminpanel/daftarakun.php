<!DOCTYPE html>
<html>

<head>
    <title>Daftar Akun</title>
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
        <p class="tulisan_menu" style="color:black;">Daftar Akun</p>
        <br>
        <br>

        <table border="1" align="center">
            <thead>
                <th>No</th>
                <th>Username</th>
                <th>Level</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                include '../config.php';
                $no = 1;
                $sql = mysqli_query($db, "SELECT * FROM user");
                while ($query = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $query['username']; ?></td>
                        <td><?php echo $query['level']; ?></td>
                        <td>
                            <a href="detailuser.php?id=<?php echo $query['id']; ?>" class="tomboltabel">DETAIL</a>
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