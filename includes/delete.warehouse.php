<?php
require_once(__DIR__ . '/db-connect.php'); 
session_start();

$idWarehouse = $_GET['id'];
if(isset($_SESSION['username'])){

    $sql="DELETE FROM warehouses WHERE idWarehouse = ?";
    if($stmt = $dbh -> prepare($sql)) {
        $stmt->bindParam(1,$idWarehouse,PDO::PARAM_STR);
        $stmt -> execute();
        echo '{"status": 1, "message":"Product deleted", "line":"'.__LINE__.'"}';
        header("Location: http://localhost/preloved/profile/warehouses.php");
    } else {
        sendErrorMessage('* sql error', __LINE__ );
      
    }
    

}

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}