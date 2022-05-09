<?php
$hostName='localhost';
$userName='root';
$password='';
$dbName='hospitaldb';
$conn = new mysqli($hostName, $userName, $password, $dbName);

function compute_age($date_of_birth){
    $dateOfBirth = $date_of_birth;
  $today = date("Y-m-d");
  $diff = date_diff(date_create($dateOfBirth), date_create($today));
  return $diff->format('%y');
}
?>