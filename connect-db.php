<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "shop";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$conn) {
  echo "Connecttion failed:" . mysqli_connect_error($conn);
}// else {
//   echo "Connected";
// }
