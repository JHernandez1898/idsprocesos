<?php
session_start();
include("Template.php");
  if (!isset($_SESSION['AdminUser']))  header('Location: login.php'); 
  if (isset($_GET["Logout"])) { unset($_SESSION["AdminUser"]); }
?>