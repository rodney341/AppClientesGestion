<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'android_citas'
) or die(mysqli_error($mysqli));

?>
