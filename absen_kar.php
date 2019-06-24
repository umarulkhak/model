<a href="logout.php">Logout</a>
<title>Absensi Management System</title>

<h3>Form Edit Data Karyawan</h3>

<hr>
<form method="post" action="">
      <table>
        <tr>
          <td>NIP</td>
          <td><input type="text" name="txtNIP"><td/>
        </tr>
        <tr>
          <td>KETERANGAN</td>
          <td>
            <select name="txtKET">
              <option>- Pilih -</option>
              <option value="Hadir">M</option>
              <option value="Alfa">A</option>
            </select>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Absen"><td/>
        </tr>
        </table>
</form>

<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}
include "config.php";
if ($_SERVER['REQUEST_METHOD']== 'POST') {
      $update = mysqli_query($conn, "UPDATE karyawan SET keterangan='$_POST[txtKET]' WHERE nip='$_POST[txtNIP]'");

            if ($update) {
                echo "Absensi Berhasi!";
            }else {
              echo "Gagal Melakukan Absen!";
            }
}
