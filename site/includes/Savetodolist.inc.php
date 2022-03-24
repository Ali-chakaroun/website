<?php
if (isset($_POST["Savetodb"])) {
  $Header = $_POST["headertxt"];
  $Text = $_POST["bodytxt"];


  require_once 'dbhtodo.inc.php';
  require_once 'function.inc.php';

  if (Insertinfo($connlist,$Header,$Text) !== false) {
    header("location: ../Todolist.php?error=failedtoupload");
    exit();
  }

}else if (isset($_POST["deletelist"]) || isset($_POST["deletelist"])){
    $ListID = $_POST["listid"];
  require_once 'dbhtodo.inc.php';
  require_once 'function.inc.php';

   if (!DeleteList($connlist,$ListID))  {
     header("location: ../Todolist.php?error=failedtodelete");
     exit();
   }
}
else if ((isset($_POST["Canclebtn"]))) {
  header("location: ../Todolist.php");
  exit();
}
else {
  header("location: ../signup.php");
  exit();
}
