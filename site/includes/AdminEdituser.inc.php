<?php
include_once '../header.php';

if (isset($_POST["edit_btn"])) {
$currentsession = $_SESSION["userid"];

$samename;
$sameemail;
$samepassword;
  if(!empty($_POST["Name"])){
    $name =  $_POST["Name"];
  }
  else {
    $name = $_POST["Username"];
    $samename = true;

  }
  if(!empty($_POST["Email"])){
    $email = $_POST["Email"];
  }
  else {
    $email = $_POST["Useremail"];
    $sameemail = true;
  }
  if(!empty($_POST["Password"])){
    $pass = $_POST["Password"];
  }
  else {
    $pass = $_POST["UserPass"];
    $samepassword = true;

  }
if(!empty($_POST["userAdmin"]) || strlen($_POST["userAdmin"]) ){
  $Admin = $_POST["userAdmin"];

}
else {
  $Admin = $_POST["Admin-lvl"];

}
$userid =   $_POST["User-id"];

require_once 'dbh.inc.php';
require_once 'function.inc.php';

  if (invalidname($name) !== false) {
    header("location: ../Users.php?error=invalidname");
    exit();
  }
/*  if (passemail($email) !== false) {
    header("location: ../Users.php?error=invalidemail");
    exit();
  }*/

  /*if (username($conn,$name,$email) !== false) {
    header("location: ../Updateuser.php?error=usernametaken");
    exit();
  }*/

  if(!$samename){
      if (esistingname($conn,$name) !== false) {
        header("location: ../Users.php?error=nametaken");
        exit();
    }
}
if(!$sameemail){
  if (existingemail($conn,$email) !== false) {
    header("location: ../Users.php?error=emailtaken");
    exit();
}
}
if (intval($userid) !== intval($currentsession)) {

  if(!$samepassword){
  AdminupdateUser($conn,$name,$email,$pass,$userid,$Admin);
}else {
  AdminupdateUsernopass($conn,$name,$email,$userid,$Admin);
}
}
else {

  if(!$samepassword){
  Adminupdateself($conn,$name,$email,$pass,$userid,$Admin);
}else {
  Adminupdateselfnopass($conn,$name,$email,$userid,$Admin);
}
}

}

else {
    header("location: ../Users.php");
   exit();
}
