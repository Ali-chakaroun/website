<?php
include_once 'header.php';
if ( ($_SESSION["Adminlvl"] === null)) {

	header("location: signup.php");
	 exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CSS User Profile Card</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="left">

			<?php
			if (!$_SESSION["userimage"]) {
				echo '<img src="Mainpage/profile.jpg"/>';
			}
			else {
				echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION["userimage"]).'"/>';
			}

			 ?>
				<button ><a href="Updateuser.php">Update profile</a></button>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Username:</h4>
										<?php

										/*if (change === 1) {
										echo "<input  id='name' name='Name' placeholder=".$_SESSION["username"]."></input>";
									}*/
											echo "<p>" .$_SESSION["username"]."</p>";
										?>
                 </div>
                 <div class="data">
                   <h4 >Email:</h4>
                  <?php
										echo "<p>" .$_SESSION["useremail"]."</p>";
										?>
              </div>
            </div>
        </div>
      <div class="projects">
            <div class="projects_data">
							<div class="data">
								 <h4>Password:</h4>
								 <p>************</p>
							</div>
							<div class="data">
								<?php
								if (isset($_GET["error"])) {
							if ($_GET["error"] == "none") {
								echo "<p style='color:green;font-size:20px;font-weight:bold;'>Updated</p>";
						}
					}
						?>
						</div>
            </div>
        </div>

        <div class="social_media">
            <ul>
              <li><a ><i class="fab fa-facebook-f"></i></a></li>
              <li><a ><i class="fab fa-twitter"></i></a></li>
              <li><a ><i class="fab fa-instagram"></i></a></li>
          </ul>
      </div>
    </div>
</div>
<script>
function change() {
  var change;
	change = 1;
}
</script>
</body>
</html>
