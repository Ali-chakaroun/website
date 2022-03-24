<?php

if (!isset($_POST["Adminpage"])) {
  header("location: ../signup.php");
   exit();
}
else {
  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

  if(countusers($conn)){
  header("location: ../Adminpage.php");
  exit();
}
else{
  header("location: ../Homepage.php?error=yayeet");
  exit();
}
}
/**********
$sql = "SELECT * FROM sign_up";
$result = mysqli_query($conn, $sql);
if ($result)
  {

      $row = mysqli_num_rows($result);

         if ($row)
            {
               echo "<div style='font-weight: bold;'class='numbers'>$row users total</div>";
            }

      mysqli_free_result($result);
  }


  mysqli_close($conn);
**************/
