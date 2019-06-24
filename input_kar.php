<title>Absensi Management System</title>
<h3 align="center">Form Input Data Karyawan</h3>
<hr>
<form method="post" action="">
      <table>
        <tr>
          <td>NIP</td>
          <td><input type="text" name="txtNIP"><td/>
        </tr>
        <tr>
          <td>NAMA</td>
          <td><input type="text" name="txtNAMA"><td/>
        </tr>
        <tr>
          <td>JABATAN</td>
          <td><input type="text" name="txtJBT"><td/>
        </tr>
        <tr>
          <td>KETERANGAN</td>
          <td>
            <select name="txtKET">
              <option value="">- Pilih -</option>
              <option value="Hadir">M</option>
              <option value="Alfa">A</option>
            </select>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Simpan"><td/>
        </tr>
        </table>
</form>

<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:loginAdmin.php");
    exit;}
include "config.php";
if ($_SERVER['REQUEST_METHOD']== 'POST') {
      $simpan = mysqli_query($conn, "INSERT INTO karyawan(nip,nama,jabatan,keterangan)
      VALUES('$_POST[txtNIP]','$_POST[txtNAMA]','$_POST[txtJBT]','$_POST[txtKET]')");

            if ($simpan) {
                header('location:data_kar.php');
            }else {
              echo "Gagal Menyimpan Data!";
            }
}
 ?>
