<?php 
require_once(__DIR__ . '/db-connect.php'); 

if(isset($_SESSION['username'])){

    if (empty($_POST['creditcard'])) {
        sendErrorMessage('* Please fill in', __LINE__ );   
    }

}