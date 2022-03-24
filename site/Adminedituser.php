<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
include_once 'Sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" href="Adminpage.css">
</head>
<body>
	<div class="Tablescrolledit">
<table class="Table">
	<?php
  $Edituser = $_POST["edit_id"];
        $query = "SELECT * FROM sign_up WHERE ID = '$Edituser'";
        $query_run = mysqli_query($conn, $query);

    ?>
  <tr>
		<th>UserID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Password</th>
		<th>Admin</th>
		<th>Edit</th>
		<th>Cancle</th>
  </tr>
<?php

if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
               <form action="includes/AdminEdituser.inc.php" method="post">
          <tr>
            <td><?php  echo $row['ID']; ?></td>
            <td><?php  echo "<input  type='text' name='Name' placeholder=".$row['UserName']."></input>"; ?></td>
            <td><?php  echo "<input  type='text' name='Email' placeholder=".$row['Email']."></input>"; ?></td>
            <td><?php  echo "<input  type='password' name='Password' placeholder='*******'></input>"; ?></td>
            <td><?php  echo "<input   name='userAdmin' placeholder=".$row['Admin']."></input>"; ?></td>
            <td>

                  <input type="hidden" name="Username" value="<?php echo $row['UserName']; ?>"></input>
                  <input type="hidden" name="Useremail" value="<?php echo $row['Email']; ?>"></input>
                  <input type="hidden" name="UserPass" value="<?php echo $row['PassWord']; ?>"></input>
                  <input type="hidden" name="User-id" value="<?php echo $row['ID']; ?>"></input>
                  <input type="hidden" name="Admin-lvl" value="<?php echo $row['Admin']; ?>"></input>
                  <button type="submit" name="edit_btn" class="Edit"> EDIT</button>

            </td>
            </form>
            <td>
                <form action="Users.php" method="">
                  <button  name="Cancle_btn" class="Cancle"> Cancle</button>
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

</body>
</body>
</html>
