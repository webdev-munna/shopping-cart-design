<?php
require 'create-db.php';

$selQry = "SELECT *
FROM student_details JOIN student_results AS exam_results
ON student_details.roll = exam_results.roll
ORDER BY gpa DESC"; // USE JOIN OR INNER JOIN

// $selQry = "SELECT * FROM student_details, student_results WHERE student_details.roll = student_results.roll ORDER BY gpa DESC";

$cmd = mysqli_query($conn, $selQry);
// $afterAssoc = mysqli_fetch_assoc($cmd);
foreach ($cmd as $result) {
  echo $result['name'] . "<br>";
  echo $result['student_group'] . "<br>";
  echo $result['gpa'] . "<br> <br>";
}
