<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
include_once 'Sidebar.php';
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
	<div class="toptext">
		<?php
		if (isset($_SESSION["username"])) {
			echo "<p> Welcome " .$_SESSION["username"]."</p>";
		}
		?>
	</div>
	<div class="Tablescroll">
<table class="Table">

	<?php
        $query = "SELECT * FROM sign_up";
        $query_run = mysqli_query($conn, $query);
    ?>
  <tr>
		<th>UserID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Password</th>
		<th>Admin</th>
		<th>Edit</th>
		<th>Delete</th>
  </tr>

<?php
if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
          <tr>
            <td><?php  echo $row['ID']; ?></td>
            <td><?php  echo $row['UserName']; ?></td>
            <td><?php  echo $row['Email']; ?></td>
            <td><?php  echo "**********" ?></td>
            <td><?php  echo $row['Admin']; ?></td>
            <td>
                <form action="Adminedituser.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID']; ?>">
                    <button href="Adminedituser.php" type="submit" name="edit_btn" class="Edit"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="includes/Usertable.inc.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['ID']; ?>">
                  <button type="submit" name="delete_btn" class="Delete"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
            }
        }
        else {
            echo "No Record Found";
        }
 ?>

</table>
</div>
<div class="warning">
<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "youcandeleteyourself") {
    echo "<p style='color:red;background-color: black;position:relative;width:300px;left:30%;height:20px;text-align: center;'>This User is you you cant delete it</p>";
  }
	else if ($_GET["error"] == "invalidname") {
    echo "<p style='color:red;background-color: black;position:relative;width:300px;left:30%;height:20px;text-align: center;'>Updateting failed Username invalid</p>";
  }
	else if ($_GET["error"] == "nametaken") {
    echo "<p style='color:red;background-color: black;position:relative;width:300px;left:30%;height:20px;text-align: center;'>Updating failed Username taken</p>";
  }
	else if ($_GET["error"] == "emailtaken") {
    echo "<p style='color:red;background-color: black;position:relative;width:300px;left:30%;height:20px;text-align: center;'>Update failed Email taken</p>";
  }
  else if($_GET["error"] == "done"){
    echo "<p style='color:green;background-color: black;position:relative;width:300px;left:30%;height:20px;text-align: center;'name='Done'>User was deleted successfully</p>";
  }
	else if($_GET["error"] == "true"){
    echo "<p style='color:green;background-color: black;position:relative;width:300px;left:30%;height:20px;text-align: center;'name='Done'>User updated successfully</p>";
  }
}
?>
</div>
</body>
</body>
</html>
