<?php
include_once 'header.php';

require_once 'includes/dbh.inc.php';
?>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Style1.css">


</head>
<body>
	<?php
				$query = "SELECT forumpage.ID,forumpage.UserID,sign_up.UserName,sign_up.Image, forumpage.Postheader, forumpage.postbody
				FROM sign_up
        INNER JOIN forumpage.forumpage
        ON sign_up.ID=forumpage.UserID;";
				$query_run = mysqli_query($conn, $query);

		?>
		<?php
		if ( isset($_SESSION["Adminlvl"])) {

  echo  "<form  action='Addtoforum.php' method='post'>";
	echo	"<div class='addbtn'>";
  echo	"<button class='Add' type='submit' name='Addalist'>&plus; Add</button>";
  echo	"</div>";
  echo  "</form>"	;
		}
	?>
<div class="Posts">
<?php
if(mysqli_num_rows($query_run) > 0)
				{
						while($row = mysqli_fetch_assoc($query_run))
						{
 ?>
  <div class="userpost">
    <div class="userinfo">
			<?php
			if (!$row["Image"] ) {
				echo '<img src="Mainpage/profile.jpg"/>';
			}
			else {
				$image = stripslashes($row['Image']);
			echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>';

			}

		?>
      <div class="username">
				<?php
		echo $row['UserName'];
				 ?>
      </div>
      <div class="posttitle" >
				<?php
		echo $row['Postheader'];
				 ?>
      </div>
      <form  action="includes/Savetoforum.inc.php" method="post">
					<input type="hidden" name="forumid" value="<?php echo $row['ID']; ?>">
				<?php
					if ( isset($_SESSION["Adminlvl"])) {
				if ($_SESSION["Adminlvl"] >= 1 || $_SESSION["userid"] == $row["UserID"]) {
				  echo "<button class='delete' name='deleteforum'>delete</button>";
				}
			}
			?>
      </form>
			<form  action="Edittheforum.php" method="post">
					<input type="hidden" name="forumid" value="<?php echo $row['ID']; ?>">
					<input type="hidden" name="forumheader" value="<?php echo $row['Postheader']; ?>">
					<input type="hidden" name="forumbody" value="<?php echo $row['postbody']; ?>">
				<?php
					if ( isset($_SESSION["Adminlvl"])) {
				if ($_SESSION["Adminlvl"] >= 1 || $_SESSION["userid"] == $row["UserID"]) {
					echo "<button class='edit' name='editforum'>edit</button>";
				}
			}
			?>
			</form>
    </div>
    <div class="posttext">
      <textarea disabled class="usertext"><?php echo $row['postbody'];?></textarea>
    </div>
</div>
<?php
}
}
else {
echo "No Record Found";
}
 ?>
</div>
</body>
</html>
