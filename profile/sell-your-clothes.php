<?php
$sPageName = "Sell";
session_start();
if(isset($_SESSION['username'])){
  require_once(__DIR__ . '/../navigation/header-logout.php');
} 

if(empty($_SESSION)){
  require_once(__DIR__ . '/../navigation/header.php');
}
?>  