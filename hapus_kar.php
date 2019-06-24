<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:loginAdmin.php");
    exit;
}
include "config.php";
    $hapus = mysqli_query($conn, "DELETE FROM karyawan WHERE nip='$_GET[nip]'");

  if ($hapus) {
      header('location:data_kar.php');
  }else {
    echo "Gagal Menghapus Data!";
  }
 ?>
