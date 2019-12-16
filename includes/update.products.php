<?php
require_once(__DIR__ . '/db-connect.php'); 
session_start();

$idProduct = $_POST['id'];
$key =$_POST['key'];
$value = $_POST['value'];
echo $key;

if(isset($_SESSION['username'])){

    
    $sql = "SELECT * FROM products WHERE idProduct=:idProduct";
    $stmt = $dbh -> prepare($sql);
    $stmt->bindParam(':idProduct',$idProduct,PDO::PARAM_STR);
    $stmt -> execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count == 1 && !empty($row)) {
        
           
            $sql = "UPDATE products SET $key=:valueOfProducts
                    WHERE idProduct=:idProduct";
            if($stmt = $dbh->prepare($sql)) {
                // Binding Post Values
                $stmt->bindParam(':valueOfProducts',$value,PDO::PARAM_STR);
                $stmt->bindParam(':idProduct',$idProduct,PDO::PARAM_STR);
                $stmt -> execute();
                echo '{"status": 1, "message":"New record updated successfully", "line":"'.__LINE__.'"}';
            } else {
                sendErrorMessage('* sql error', __LINE__ );
            }
        

       
       
  } else {
    sendErrorMessage('* no user found', __LINE__ );

}

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}

}