<?php
if (isset($_POST["Savetodb"])) {

  $Header = $_POST["headertxt"];
  $Text = $_POST["bodytxt"];
  $Userid =$_POST["userid"];

  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

if (AddtoForum($conn,$Userid,$Header,$Text) !== false) {
  header("location: ../Forum.php?error=failedtoupload");
  exit();
}
}
else if (isset($_POST["Edittoforum"])) {
  $Header = $_POST["headertxt"];
  $Text = $_POST["bodytxt"];
  $Forumid =$_POST["Forumid"];

  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

if (EdittheForum($conn,$Forumid,$Header,$Text) !== false) {
  header("location: ../Forum.php?error=failedtoupload");
  exit();
}
}



else if (isset($_POST["deleteforum"])){
  $forumid = $_POST["forumid"];
  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

  if (Deletefromforum($conn,$forumid) !== false) {
    header("location: ../Forum.php?error=failedtodelete");
    exit();
  }


}
else if ((isset($_POST["Canclebtn"]))) {
  header("location: ../Forum.php");
  exit();
}
else {
  header("location: ../signup.php");
  exit();
}
