<?php
 $serverName = "127.0.0.1";
 $dbuserName = "root";
 $dbpassword ="root123";
 $dbName = "todolist";
 $connlist = mysqli_connect($serverName,$dbuserName,$dbpassword,$dbName);
 if (!$connlist) {
   die("connection failed:" .mysqli_connect_error());
 }
