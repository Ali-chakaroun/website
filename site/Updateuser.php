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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="left">
<form action="includes/Updateuser.inc.php" method="post" enctype="multipart/form-data">

	<input type="file" id="file1" name="image">
<label  class="imgprev" for="file1">

	<?php
	if (!$_SESSION["userimage"]) {
		echo '<img src="Mainpage/profile.jpg"/>';
	}else{
	echo '<img src="data:image/jpeg;base64,'. base64_encode($_SESSION["userimage"]).'"/>';
}
	 ?>
</label>
				<button type="submit" name="submit">Save changes</button>



    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Username:</h4>
										<?php
                    echo "<input  type='name' name='Name' placeholder=".$_SESSION["username"]."></input>";
										?>
                 </div>
                 <div class="data">
                   <h4 >Email:</h4>
                   <?php
                   echo "<input  type='email' name='Email' placeholder=".$_SESSION["useremail"]."></input>";
                   ?>
              </div>
            </div>
        </div>
      <div class="projects">
            <div class="projects_data">
							<div class="data">
								 <h4>Password:</h4>
                 <?php
                 echo "<input  type='password' name='Password' placeholder='new password'></input>";
                 echo "<input  type='password' name='rePassword' placeholder='repeat password'></input>";
                 ?>
							</div>
              <div class="data">
                <?php
                if (isset($_GET["error"])) {
                  if ($_GET["error"] == "invalidname") {
                    echo "<p style='color:red;font-size:20px;font-weight:bold;'>this name is invalid</p>";
                  }
                  elseif ($_GET["error"] == "invalidemail") {
                    echo "<p style='color:red;font-size:20px;font-weight:bold;'>This email is invalid</p>";
                  }
                  elseif ($_GET["error"] == "passworddontmatch") {
                    echo "<p style='color:red;font-size:20px;font-weight:bold;'>passwords dont match</p>";
                  }
                  if ($_GET["error"] == "nametaken") {
                    echo "<p style='color:red;font-size:20px;font-weight:bold;'>This name is taken</p>";
                  }

                  elseif ($_GET["error"] == "emailtaken") {
                    echo "<p style='color:red;font-size:20px;font-weight:bold;'>This email is taken</p>";
                }
								elseif ($_GET["error"] == "invalidimage") {
									echo "<p style='color:red;font-size:20px;font-weight:bold;'>Image must be png,jpg,gif</p>";
							}
							elseif ($_GET["error"] == "soemthingwentwrong") {
								echo "<p style='color:red;font-size:20px;font-weight:bold;'>Something went wrong</p>";
						}

                }
                 ?>
              </div>
            </div>
        </div>

        <div class="gray_social_media">
            <ul>
              <li><a ><i class="fab fa-facebook-f"></i></a></li>
              <li><a ><i class="fab fa-twitter"></i></a></li>
              <li><a ><i class="fab fa-instagram"></i></a></li>
          </ul>
      </div>
    </div>
    </form>
</div>
<script>
$('#file1').on('change', function() {
  var files = !!this.files ? this.files : [];
  if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

  if (/^image/.test(files[0].type)) { // only image file
		console.log(this.files[0].type);
    var reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(files[0]); // read the local file

    reader.onloadend = function() { // set image data as background of div
      $('img').attr('src', reader.result).removeClass('default')
    }
  }
	else{
   console.log("not an image");
	}
})
 </script>


</body>
</html>
