<?php
require_once(__DIR__ . '/db-connect.php'); 
session_start();

$idProduct = $_POST['id'];
if(isset($_SESSION['username'])){

    $sql="DELETE FROM products WHERE  idProduct=:idProduct AND idCustomer=:idCustomer";
    if($stmt = $dbh -> prepare($sql)) {
        $stmt->bindParam(':idProduct',$idProduct,PDO::PARAM_STR);
        $stmt->bindParam(':idCustomer',$_SESSION['username'],PDO::PARAM_STR);
        $stmt -> execute();
        echo '{"status": 1, "message":"Product deleted", "line":"'.__LINE__.'"}';
    } else {
        sendErrorMessage('* sql error', __LINE__ );
      
    }
    

}

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}