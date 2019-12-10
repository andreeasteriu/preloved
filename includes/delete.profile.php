<?php
require_once(__DIR__ . '/db-connect.php'); 
session_start();

if(isset($_SESSION['username'])){
    $sql="DELETE FROM customers WHERE idCustomer=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        sendErrorMessage('* sql error', __LINE__ );
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
        mysqli_stmt_execute($stmt);
        session_destroy(); //MUST HAVE
        header('Location:../main/index.php');
        echo '{"status": 1, "message":"Profile deleted", "line":"'.__LINE__.'"}';
    }
}

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}