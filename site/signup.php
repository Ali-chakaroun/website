<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<section class="signup">
  <div class="Tab">
  <form action="includes/singup.inc.php" method="post">
    <h1 style="font-size: 30px;text-align: center;position:relative;">Sign up</h1>
    <input type="text" name="name" placeholder="username">
    <input type="password" name="pass" placeholder="password">
    <input type="password" name="passrepeat" placeholder="repeat password">
    <input type="text" name="email" placeholder="email">
    <button  class="signupbutton" type="submit" name="submit">Sign up</button>
  </form>
</div>
<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyInput") {
    echo "<p style='color:red;'>Fill in all fields</p>";
  }
  elseif ($_GET["error"] == "invalidname") {
    echo "<p style='color:red;'>Invalid name</p>";
  }
  elseif ($_GET["error"] == "invalidemail") {
    echo "<p style='color:red;'>Invalid email</p>";
  }
  elseif ($_GET["error"] == "passworddontmatch") {
    echo "<p style='color:red;'>Passwords dont match</p>";
  }
  elseif ($_GET["error"] == "usernametaken") {
    echo "<p style='color:red;'>username or email is taken</p>";
  }
  elseif ($_GET["error"] == "stmtfail") {
    echo "<p style='color:red;'>something went wrong</p>";
  }
  elseif ($_GET["error"] == "none") {
    echo "<p style='color:green;'>you have successfully sign up</p>";
  }
}
 ?>
</section>
</body>
</html>
