<?php
include_once 'header.php';
?>
<section class="lognin">
  <div class="Tab">
  <form action="includes/lognin.inc.php" method="post">
    <h1 style="font-size: 30px;text-align: center;position:relative;">Log in</h1>
    <input type="text" name="name" placeholder="username">
    <input type="password" name="pass" placeholder="password">
    <button class="logninbutton" type="submit" name="submit">Log in</button>
  </form>
</div>
<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p  style='color:red;'>Fill in all fields</p>";
  }
  elseif ($_GET["error"] == "wrongnameoremail") {
    echo "<p style='color:red;'>Wrong name or email</p>";
  }
  elseif ($_GET["error"] == "wronglognin") {
    echo "<p style='color:red;'>Wrong password or email or name</p>";
  }

}
 ?>
</section>
