<?php
session_start();
if (!isset($_SESSION['user'])) {
 header( "Location: index_CR11.php");
} else if(isset($_SESSION[ 'user'])!="") {
 header("Location: home_CR11.php");
}

if  (isset($_GET['logout'])) {
 unset($_SESSION['user' ]);
 session_unset();
 session_destroy();
 header("Location: index_CR11.php");
 exit;
}
?>