<?php
require_once(__DIR__ . '/db-connect.php'); 
session_start();

$idProduct = $_POST['id'];


if(isset($_SESSION['username'])){

    $sql = "SELECT * FROM products WHERE idProduct=:idProduct";
    $stmt = $dbh -> prepare($sql);
    $stmt->bindParam(':idProduct',$idProduct,PDO::PARAM_STR);
    $stmt -> execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count == 1 && !empty($row)) {
        
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 
            // File path config 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($_FILES['image']['name'])['extension'];
            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg'); 
            if(in_array($fileType, $allowTypes)){ 
            $tmpName  = $_FILES['image']['tmp_name'];  
            $fp = fopen($tmpName, 'rb'); // read binary
            } else{
                sendErrorMessage('* Sorry, only JPG, JPEG, & PNG files are allowed to upload', __LINE__ );
            }
        }
            $sql = "UPDATE products SET image=:imageProduct
                    WHERE idProduct=:idProduct";
            if($stmt = $dbh->prepare($sql)) {
                // Binding Post Values
                $stmt->bindParam(':imageProduct',$fp,PDO::PARAM_LOB);
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