<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$mysqli = "INSERT INTO user (username, password, level) VALUES ('$username', '$password', '$level')";

$result = mysqli_query($db, $mysqli);

header('Location:index.php');

?>