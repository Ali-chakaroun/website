<?php
include_once 'header.php';
include_once 'Sidebar.php';
require_once 'includes/dbhtodo.inc.php';
if (($_SESSION["Adminlvl"] === 0) || ($_SESSION["Adminlvl"] === null)) {

	header("location: signup.php");
	 exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin page.exeeeeeeeeee</title>
	<link  rel="stylesheet" href="Adminpage.css">
</head>

<body>
	<?php
				$query = "SELECT * FROM todolist";
				$query_run = mysqli_query($connlist, $query);

		?>

	<form  action="Addtodolist.php" method="post">
		<div class="Addtolist">
	<button class="Add" type="submit" name="Addalist">&plus; Add</button>
		</div>
	</form>
	<?php
	if(mysqli_num_rows($query_run) > 0)
	        {
	            while($row = mysqli_fetch_assoc($query_run))
	            {
	               ?>
<div class="Box">
	<div class="Header">
		<?php
echo $row['Title'];
		 ?>

	</div>
	<textarea disabled class="Todotext"><?php echo $row['Text'];?></textarea>
	<div class="finish">
		<form  action="includes/Savetodolist.inc.php" method="post">
		<input type="hidden" name="listid" value="<?php echo $row['ID']; ?>">
	<button class="Deletelist" name="deletelist">Delete</button>
	<button class="Completelist" name="comepletelist">Complete</button>

		</form>
</div>
</div>
	<?php
		}
}
else {
		echo "No Record Found";
}
?>

</body>
</html>
