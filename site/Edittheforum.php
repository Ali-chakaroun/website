<?php
include_once 'header.php';

if ($_SESSION["Adminlvl"] === null) {

  header("location: signup.php?error=lmaoman");
   exit();
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Admin page.exeeeeeeeeee</title>
 	<link  rel="stylesheet" href="Adminpage.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 </head>

 <body>
   <form id="edittext" action="includes/Savetoforum.inc.php" method="post">
     <div class="Edditingtable">

<input class="headertext" id="headertext"name="headertxt" value="<?php echo $_POST["forumheader"]; ?>" maxlength="40"></input>
<div id="headercount">
  <span id="headercurrent">0</span>
  <span id="headermaximum">/40</span>
</div>
<textarea class="Bodytext" id="bodytext"name="bodytxt" maxlength="600" ><?php echo $_POST["forumbody"]; ?></textarea>

  <div class="Editlistbuttons">
	<button class="Cancle" type="submit" name="Canclebtn" >Cancle</button>
	<button class="Savelist" type="submit" name="Edittoforum">Save</button>
  <div id="bodycount">
    <span id="bodycurrent">0</span>
    <span id="bodymaximum">/600</span>
  </div>
  </div>
  <input type="hidden" name="Forumid" value="<?php echo $_POST["forumid"]; ?>">
</div>
</form>
   <script>

       $(window).ready(function() {
       $("#edittext").on("keypress", function (event) {
           console.log("aaya");
           var keyPressed = event.keyCode || event.which;
           if (keyPressed === 13 && event.target.tagName != 'TEXTAREA' ) {
               event.preventDefault();
               return false;
           }
       });
     });


       $('#headertext').keyup(function() {
         var characterCount = $(this).val().length,
             current = $('#headercurrent'),
             maximum = $('#headermaximum'),
             theCount = $('#headercount');
         current.text(characterCount);
         if (characterCount < 10) {
           current.css('color', '#000000');
           maximum.css('color', '#000000');
         }
         if (characterCount >= 20 && characterCount <= 30) {
           current.css('color', '#de5454');
           maximum.css('color', '#de5454');
         }
         if (characterCount >= 30 && characterCount < 40) {
           current.css('color', '#c12525');
           maximum.css('color', '#c12525');
         }
         if (characterCount == 40) {
           maximum.css('color', '#8f0001');
           current.css('color', '#8f0001');
           theCount.css('font-weight','bold');
         }
       });


       $('#bodytext').keyup(function() {

         var characterCount = $(this).val().length,
             current = $('#bodycurrent'),
             maximum = $('#bodymaximum'),
             theCount = $('#bodycount');
         current.text(characterCount);
         if (characterCount < 200) {
           current.css('color', '#000000');
           maximum.css('color', '#000000');
         }
         if (characterCount > 200 && characterCount < 300) {
           current.css('color', '#d62929');
           maximum.css('color', '#d62929');
         }
         if (characterCount > 300 && characterCount < 400) {
           current.css('color', '#c12525');
           maximum.css('color', '#c12525');
         }
         if (characterCount > 400 && characterCount < 500) {
           current.css('color', '#ab2121');
           maximum.css('color', '#ab2121');
         }
         if (characterCount > 500 && characterCount < 600) {
           current.css('color', '#811818');
           maximum.css('color', '#811818');
           theCount.css('font-weight','bold');
         }
         if (characterCount == 600) {
           maximum.css('color', '#8f0001');
           current.css('color', '#8f0001');
           theCount.css('font-weight','bold');
         }
       });

   </script>
 </body>
 </html>
