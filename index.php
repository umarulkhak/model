<?php
session_start();

if (isset($_SESSION["login"])) {
  header("location:absen_kar.php");
  exit;
}
require 'config.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE
       username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1){
      //cek password
      $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      //set Session
      $_SESSION["login"] = true;


       header("location:absen_kar.php");
       exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="css\login.css">
    <title>Absensi Management System</title>
  </head>
  <body>
      <h4>Login Sebagai <a style="color:white;" href="loginAdmin.php" class="">Admin</a></h4>
        <form class="container" action="" method="post">
          <h1>Halaman Login Karyawan</h1>
          <input class="name" type="text" name="username" placeholder="Username">
          <input class="password" type="password" name="password" placeholder="Password">
          <?php if (isset($error)) : ?>
          <p style="color: red; font-style: italic;">username / password salah!</p>
          <?php endif; ?>
          <input class="submit" type="submit" name="login" value="Login">
        </form>

  </body>
</html>
