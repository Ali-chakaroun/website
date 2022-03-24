<?php
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $pass = $_POST["pass"];
  require_once 'dbh.inc.php';
  require_once 'function.inc.php';
  if (emptyInputLognin($name,$pass) !== false) {
   header("location: ../lognin.php?error=emptyinput");
   exit();
  }
  logninUser($conn,$name,$pass);
}
else {
  header("location: ../lognin.php");
  exit();
}
