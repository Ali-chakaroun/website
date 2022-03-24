<?php
function emptyInputSignup($name,$email,$pass,$passrepeat){
  $result;
  if (empty($name) || empty($email) || empty($pass) || empty($passrepeat)) {
  $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidname($name){
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/" , $name)) {
  $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
function passemail($email){
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
function passmatch($pass,$passrepeat){
  $result;
  if ($pass !== $passrepeat) {
  $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
function username($conn,$name,$email){
$sql = "SELECT * FROM sign_up WHERE UserName = ? OR Email = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
  header("location: ../signup.php?error=stmt fail");
  exit();
}
mysqli_stmt_bind_param($stmt,"ss",$name,$email);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
}
else {
  $result = false;
  return $result;
}
mysqli_stmt_close($stmt);

}

function esistingname($conn,$name){
$sql = "SELECT * FROM sign_up WHERE UserName = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
  header("location: ../signup.php?error=stmtfail");
  exit();
}
mysqli_stmt_bind_param($stmt,"s",$name);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
}
else {
  $result = false;
  return $result;
}
mysqli_stmt_close($stmt);

}

function existingemail($conn,$email){
$sql = "SELECT * FROM sign_up WHERE Email = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
  header("location: ../signup.php?error=stmtfail");
  exit();
}
mysqli_stmt_bind_param($stmt,"s",$email);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
}
else {
  $result = false;
  return $result;
}
mysqli_stmt_close($stmt);

}

function createUser($conn,$name,$email,$pass){
$sql = "INSERT INTO sign_up(UserName,Email,PassWord,Admin) VALUES(?,?,?,0);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
  header("location: ../signup.php?error=stmtfail");
  exit();
}
$hashedpass = password_hash($pass, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt,"sss",$name,$email,$hashedpass);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: ../signup.php?error=none");
exit();
}

function emptyInputLognin($name,$pass){
  $result;
  if (empty($name) || empty($pass)) {
  $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function logninUser($conn,$name,$pass){
  $nameexist = username($conn,$name,$name);
  if ($nameexist === false) {
    header("location: ../lognin.php?error=wrongnameoremail");
    exit();
  }
  $passhashed = $nameexist["PassWord"];
  $checkpass = password_verify($pass, $passhashed);
  if ($checkpass === false) {
    header("location: ../lognin.php?error=wronglognin");
    exit();
  }
  else if ($checkpass === true) {
    session_start();
    $_SESSION["username"] = $nameexist["UserName"];
    $_SESSION["useremail"] = $nameexist["Email"];
    $_SESSION["Adminlvl"] = $nameexist["Admin"];
  $_SESSION["userpass"] = $nameexist["PassWord"];
  $_SESSION["userid"] = $nameexist["ID"];
  $_SESSION["userimage"] = stripslashes($nameexist["Image"]);

    header("location: ../HomePage.php");
    exit();
}
}

function updateUser($conn,$name,$email,$pass,$userid,$existingpass,$imageupload){
  session_unset();
$sql = "UPDATE sign_up SET UserName = ? , Email = ? , PassWord = ?, Image = ? WHERE ID = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
  header("location: ../Profile.php?error=stmtfail");
  exit();
}


$hashedpass = password_hash($pass, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt,"sssss",$name,$email,$hashedpass,$imageupload,$userid);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$nameexist = username($conn,$name,$name);
  session_start();
  $_SESSION["username"] = $nameexist["UserName"];
  $_SESSION["useremail"] = $nameexist["Email"];
  $_SESSION["Adminlvl"] = $nameexist["Admin"];
$_SESSION["userpass"] = $nameexist["PassWord"];
$_SESSION["userid"] = $nameexist["ID"];
$_SESSION["userimage"] = stripslashes($nameexist["Image"]);
  header("location: ../Profile.php?error=none");
  exit();

}

function updateUsernopass($conn,$name,$email,$userid,$existingpass,$imageupload){
  session_unset();
$sql = "UPDATE sign_up SET UserName = ? , Email = ? , Image = ? WHERE ID = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
  header("location: ../Profile.php?error=stmtfail");
  exit();
}

  mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$imageupload,$userid);


mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$nameexist = username($conn,$name,$name);
  session_start();
  $_SESSION["username"] = $nameexist["UserName"];
  $_SESSION["useremail"] = $nameexist["Email"];
  $_SESSION["Adminlvl"] = $nameexist["Admin"];
$_SESSION["userpass"] = $nameexist["PassWord"];
$_SESSION["userid"] = $nameexist["ID"];
$_SESSION["userimage"] = stripslashes($nameexist["Image"]);
  header("location: ../Profile.php?error=none");
  exit();

}

function DeleteUser($conn,$Deletid){
  $sql = "DELETE FROM sign_up WHERE ID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location: ../Profile.php?error=stmtfail");
    exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$Deletid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../Users.php?error=done");
  exit();

  }

  function AdminupdateUser($conn,$name,$email,$pass,$userid,$Admin){
  $sql = "UPDATE sign_up SET UserName = ? , Email = ? , PassWord = ?, Admin = ? WHERE ID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location: ../Users.php?error=stmtfail");
    exit();
  }


  $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt,"sssss",$name,$email,$hashedpass,$Admin,$userid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);


    header("location: ../Users.php?error=true");
    exit();

  }

  function AdminupdateUsernopass($conn,$name,$email,$userid,$Admin){

  $sql = "UPDATE sign_up SET UserName = ?,Email = ? , Admin = ? WHERE ID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location: ../Users.php?error=stmtfail");
    exit();
  }

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$Admin,$userid);

  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);


      header("location: ../Users.php?error=true");
    exit();

  }

  function Adminupdateself($conn,$name,$email,$pass,$userid,$Admin){
    session_unset();
  $sql = "UPDATE sign_up SET UserName = ? , Email = ? , PassWord = ?, Admin = ? WHERE ID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location: ../Users.php?error=stmtfail");
    exit();
  }


  $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt,"sssss",$name,$email,$hashedpass,$Admin,$userid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  $nameexist = username($conn,$name,$name);
    session_start();
    $_SESSION["username"] = $nameexist["UserName"];
    $_SESSION["useremail"] = $nameexist["Email"];
    $_SESSION["Adminlvl"] = $nameexist["Admin"];
  $_SESSION["userpass"] = $nameexist["PassWord"];
  $_SESSION["userid"] = $nameexist["ID"];
$_SESSION["userimage"] = stripslashes($nameexist["Image"]);
      header("location: ../Users.php?error=true");
    exit();

  }

  function Adminupdateselfnopass($conn,$name,$email,$userid,$Admin){
session_unset();
  $sql = "UPDATE sign_up SET UserName = ?,Email = ? , Admin = ? WHERE ID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location: ../Users.php?error=stmtfail");
    exit();
  }

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$Admin,$userid);

  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $nameexist = username($conn,$name,$name);
    session_start();
    $_SESSION["username"] = $nameexist["UserName"];
    $_SESSION["useremail"] = $nameexist["Email"];
    $_SESSION["Adminlvl"] = $nameexist["Admin"];
  $_SESSION["userpass"] = $nameexist["PassWord"];
  $_SESSION["userid"] = $nameexist["ID"];
$_SESSION["userimage"] = stripslashes($nameexist["Image"]);
    header("location: ../Users.php?error=true");
    exit();

  }

  function Numberofusers($conn){
    }
    function countusers($conn){
      $sql = "SELECT * FROM sign_up";
    	$result = mysqli_query($conn, $sql);
    	if ($result)
    		{
    				$row = mysqli_num_rows($result);
  					 if ($row)
    							{
    								 return nl2br($row);
    							}
    				mysqli_free_result($result);
    		}
    		mysqli_close($conn);
    }

    function Insertinfo($connlist,$Header,$Text){
    $sql = "INSERT INTO todolist(Title,Text) VALUES(?,?);";
    $stmt = mysqli_stmt_init($connlist);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("location: ../signup.php?error=stmtfail");
      exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$Header,$Text);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Todolist.php?error=none");
    exit();
    }

    function DeleteList($connlist,$ListID){
      $sql = "DELETE FROM todolist WHERE ID = ?;";
      $stmt = mysqli_stmt_init($connlist);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../Profile.php?error=stmtfail");
        exit();
      }
      mysqli_stmt_bind_param($stmt,"s",$ListID);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../todolist.php");
      exit();

      }

      function AddtoForum($conn,$Userid,$Header,$Text){
        $sql = "INSERT INTO forumpage.forumpage(UserID,Postheader,Postbody) VALUES(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header("location: ../signup.php?error=stmtfail");
          exit();
        }

        mysqli_stmt_bind_param($stmt,"sss",$Userid,$Header,$Text);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../Forum.php?error=none");
        exit();
        }

        function Deletefromforum($conn,$forumid){
          $sql = "DELETE FROM forumpage.forumpage WHERE forumpage.ID = ?;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("location: ../signup.php?error=stmtfail");
            exit();
          }

          mysqli_stmt_bind_param($stmt,"s",$forumid);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_close($stmt);
          header("location: ../Forum.php?error=none");
          exit();
        }
        function EdittheForum($conn,$Forumid,$Header,$Text){

        $sql = "UPDATE forumpage.forumpage SET Postheader = ?,postbody = ? WHERE ID = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
          header("location: ../Users.php?error=stmtfail");
          exit();
        }

          mysqli_stmt_bind_param($stmt,"sss",$Header,$Text,$Forumid);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


            header("location: ../Forum.php?error=true");
          exit();

        }
