<?php
include_once '../header.php';

if (isset($_POST["delete_btn"])) {

$Deletid =  $_POST["delete_id"];
$currentid = $_SESSION["userid"];
if (intval($currentid) === intval($Deletid)) {
  header("location: ../Users.php?error=youcandeleteyourself");
 exit();
}
  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

  if (DeleteUser($conn,$Deletid) !== false) {
    header("location: ../Updateuser.php?error=notadabase");
    exit();
  }
}

else {
    header("location: ../HomePage.php");
   exit();
}
