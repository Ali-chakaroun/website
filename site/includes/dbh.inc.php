<?php
 $serverName = "127.0.0.1";
 $dbuserName = "root";
 $dbpassword ="root123";
 $dbName = "sign_up";
 $conn = mysqli_connect($serverName,$dbuserName,$dbpassword,$dbName);
 if (!$conn) {
   die("connection failed:" .mysqli_connect_error());
 }
