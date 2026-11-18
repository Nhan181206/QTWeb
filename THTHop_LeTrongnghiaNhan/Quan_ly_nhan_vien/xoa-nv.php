<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: dangnhap.php");
    exit;
}
include "ketnoi.php";

$manv = $_GET['manv'];
mysqli_query($conn, "delete from nhanvien where manv = '$manv'");
header("Location: xoa.php");
?>
