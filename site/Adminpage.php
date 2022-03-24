<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/function.inc.php';

if (($_SESSION["Adminlvl"] === 0) || ($_SESSION["Adminlvl"] === null)) {

	header("location: signup.php");
	 exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" href="Adminpage.css">
</head>
<body>
	<?php
include_once 'Sidebar.php';
?>
<div class="numberofusers">
	<img src="Mainpage/totalusers.jpg">
	<?php
	$rows = countusers($conn);
   echo "<div style='font-weight: bold;'class='numbers'>$rows users total</div>";
	 ?>

</div>
</body>
</body>
</html>
