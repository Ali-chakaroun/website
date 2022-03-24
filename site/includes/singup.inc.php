<?php

if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $passrepeat = $_POST["passrepeat"];
  require_once 'dbh.inc.php';
  require_once 'function.inc.php';
  if (emptyInputSignup($name,$email,$pass,$passrepeat) !== false) {
   header("location: ../signup.php?error=emptyInput");
   exit();
  }
  if (invalidname($name) !== false) {
    header("location: ../signup.php?error=invalidname");
    exit();
  }
  if (passemail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
    exit();
  }
  if (passmatch($pass,$passrepeat) !== false) {
    header("location: ../signup.php?error=passworddontmatch");
    exit();
  }
  if (username($conn,$name,$email) !== false) {
    header("location: ../signup.php?error=usernametaken");
    exit();
  }
  createUser($conn,$name,$email,$pass);
}

else {
  header("location: ../signup.php");
   exit();
}
