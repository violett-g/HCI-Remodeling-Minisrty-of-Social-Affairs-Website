<?php
session_start();
require 'config.php';
$del = $_SESSION['afm'];
$query = "delete from user WHERE afm = '$del'";
$query_run = $con->query($query);
$query = "delete from business WHERE employer_afm = '$del'";
$query_run = $con->query($query);
session_unset();
header("Location:index.php");
?>
