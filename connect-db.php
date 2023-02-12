<?php

$host = "localhost";
$userName = "root";
$password = "";
$dbName = "shop";

$conn = mysqli_connect($host, $userName, $password, $dbName);
if (!$conn) {
  echo "Connecttion failed:" . mysqli_connect_error($conn);
} else {
  echo "Database Connected successfully";
}
