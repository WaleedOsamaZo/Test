<?php 
session_destroy();
session_unset();
$_SESSION  = array();
header("location:index.php");

?>