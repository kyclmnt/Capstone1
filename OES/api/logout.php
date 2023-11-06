<?php
session_start();
require "../template/constants.php";

session_destroy();
unset($_SESSION);
$_SESSION = null;

header('Location:'.BASE_PATH.'login.php');
?>