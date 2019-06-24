<title>Absensi Management System</title>
<h3 align="center">Data Karyawan</h3>
<hr>
<a href="input_kar.php">Tambah Data</a>
<table border="1" cellspacing="0" width="100%">
    <th>ID</th>
    <th>NIP</th>
    <th>NAMA</th>
    <th>JABATAN</th>
    <th>KETERANGAN</th>
    <th>Aksi</th>
  </tr>
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:loginAdmin.php");
    exit;
}
include "config.php";
$sqlKar = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY id ASC");

while ($d = mysqli_fetch_array($sqlKar)) {
    echo "<tr>
        <td align='center'>$d[id]</td>
        <td align='center'>$d[nip]</td>
        <td align='center'>$d[nama]</td>
        <td align='center'>$d[jabatan]</td>
        <td align='center'>$d[keterangan]</td>
        <td align='center'>
            <a href='edit_kar.php?nip=$d[nip]'>Edit</a> | <a href='hapus_kar.php?nip=$d[nip]'>Hapus</a>
        </td>
    </tr>";
}
 ?>
</table>
