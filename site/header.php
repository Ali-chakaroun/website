<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Style1.css">


</head>
<body>


  <div class="navbar">
    <form  action="includes/countuser.inc.php"method="post">
    <?php
    if (isset($_SESSION["username"])) {
      echo " <a href='includes/logout.inc.php'>Logout</a>";
      echo " <a href='Profile.php'>Profile page</a>";
    }
    else {
      echo " <a href='lognin.php'>log in</a>";
      echo "<a href='signup.php'>Sign up</a>";
    }
  ?>

    <div class="dropdown">

        <?php
            if (isset($_SESSION["Adminlvl"])){
              if ($_SESSION["Adminlvl"] >= 1) {
                  echo "<button class='dropbtn' name='Adminpage' href='Adminpage.php'><a>Admin</a></button>";

            }
          }
            ?>
  </form>
    </div>

<a href="Forum.php">Forum</a>
<a href="HomePage.php">Home</a>


</div>
</body>
</html>
