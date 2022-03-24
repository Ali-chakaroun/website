<?php
include_once '../header.php';

if (isset($_POST["submit"])) {
$existingpass = $_SESSION["userpass"];
$samename;
$sameemail;
$samepassword;
  if(!empty($_POST["Name"])){
    $name = $_POST["Name"];
    $samename = false;
  }
  else {
    $name = $_SESSION["username"];
    $samename = true;
  }
  if(!empty($_POST["Email"])){
    $email = $_POST["Email"];
    $sameemail = false;
  }
  else {
    $email = $_SESSION["useremail"];
    $sameemail = true;
  }
  if(!empty($_POST["Password"])){
    $pass = $_POST["Password"];
    $samepassword = false;
  }
  else {
    $pass = $_SESSION["userpass"];
    $samepassword = true;

  }
if(!empty($_POST["rePassword"])){
  $passrepeat = $_POST["rePassword"];
}
else {
  $passrepeat = $_SESSION["userpass"];
}
$userid =   $_SESSION["userid"];

if(!empty($_FILES["image"]["name"]) && $_FILES["image"]["name"] !== 0) {
         $fileName = basename($_FILES["image"]["name"]);
         $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
         $allowTypes = array('jpg','png','jpeg','gif');
         if(in_array($fileType, $allowTypes)){
$imgContent = addslashes(file_get_contents($_FILES['image']['tmp_name']));
}
else{
  $imgContent = addslashes($_SESSION["userimage"]);
  header("location: ../Updateuser.php?error=invalidimage");
  exit();
}

}
else {
  $imgContent = addslashes($_SESSION["userimage"]);
}

  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

  if (invalidname($name) !== false) {
    header("location: ../Updateuser.php?error=invalidname");
    exit();
  }
  if (passemail($email) !== false) {
    header("location: ../Updateuser.php?error=invalidemail");
    exit();
  }
  if (passmatch($pass,$passrepeat) !== false) {
    header("location: ../Updateuser.php?error=passworddontmatch");
    exit();
  }
  /*if (username($conn,$name,$email) !== false) {
    header("location: ../Updateuser.php?error=usernametaken");
    exit();
  }*/

  if(!$samename){
      if (esistingname($conn,$name) !== false) {
        header("location: ../Updateuser.php?error=nametaken");
        exit();
    }
}
if(!$sameemail){
  if (existingemail($conn,$email) !== false) {
    header("location: ../Updateuser.php?error=emailtaken");
    exit();
}
}
  if(!$samepassword){
  updateUser($conn,$name,$email,$pass,$userid,$existingpass,$imgContent);
}else {
  updateUsernopass($conn,$name,$email,$userid,$existingpass,$imgContent);
}
}


else {
    header("location: ../Updateuser.php?error=soemthingwentwrong");
   exit();
}
