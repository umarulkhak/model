<?php
session_start();
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

      $_SESSION["login"] = true;

       header("location:data_kar.php");
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
    <title>Absensi Management System</title>

    <link rel="stylesheet" href="css\sytleLoginUser.css">
  </head>
  <body>
    <h4><a style="color:white;" href="index.php">Kembali</a></h4>
        <form class="container" action="" method="post">
          <h1>Halaman Login Admin</h1>
          <input class="name" type="text" name="username" placeholder="Username">
          <input class="password" type="password" name="password" placeholder="Password">
          <?php if (isset($error)) : ?>
          <p style="color: red; font-style: italic;">username / password salah!</p>
          <?php endif; ?>
          <input class="submit" type="submit" name="login" value="Login">
        </form>

  </body>
</html>
