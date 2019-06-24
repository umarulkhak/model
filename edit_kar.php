<title>Absensi Management System</title>
<h3>Form Edit Data Karyawan</h3>
<hr>
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:loginAdmin.php");
    exit;
}
include "config.php";
$sqlEdit=mysqli_query($conn, "SELECT * FROM karyawan WHERE nip='$_GET[nip]'");
$e=mysqli_fetch_array($sqlEdit);
 ?>
<form method="post" action="">
      <table>
        <tr>
          <td>NIP</td>
          <td><input type="text" name="txtNIP" value="<?php echo $e['nip']; ?>" readonly><td/>
        </tr>
        <tr>
          <td>NAMA</td>
          <td><input type="text" name="txtNAMA" value="<?php echo $e['nama']; ?>"><td/>
        </tr>
        <tr>
          <td>JABATAN</td>
          <td><input type="text" name="txtJBT" value="<?php echo $e['jabatan']; ?>"><td/>
        </tr>
        <tr>
          <td>KETERANGAN</td>
          <td>
            <select name="txtKET">
              <option value="<?php echo $e['keterangan']; ?>"><?php echo $e['keterangan']; ?></option>
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
if ($_SERVER['REQUEST_METHOD']== 'POST') {
      $update = mysqli_query($conn, "UPDATE karyawan SET nama='$_POST[txtNAMA]',
      jabatan='$_POST[txtJBT]',keterangan='$_POST[txtKET]' WHERE nip='$_POST[txtNIP]'");

            if ($update) {
                header('location:data_kar.php');
            }else {
              echo "Gagal Mengupdate Data!";
            }
}
 ?>
