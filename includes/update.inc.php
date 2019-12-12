<?php
session_start();

require_once(__DIR__ . '/db-connect.php'); 



$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNr = $_POST['phoneNr'];
$address =  $_POST['address'];

$sql = "SELECT * FROM customers WHERE idCustomer=:idCustomer";
$stmt = $dbh -> prepare($sql);
$stmt->bindParam(':idCustomer',$_SESSION['username'],PDO::PARAM_STR);
$stmt -> execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
            
            $sql = "UPDATE customers SET firstName=:firstName, lastName=:lastName, phoneNr=:phoneNr, address=:address 
                    WHERE idCustomer=:idCustomer";
            if($stmt = $dbh->prepare($sql)) {
               
                 // Binding Post Values
                $stmt->bindParam(':firstName',$firstName,PDO::PARAM_STR);
                $stmt->bindParam(':lastName',$lastName,PDO::PARAM_STR);
                $stmt->bindParam(':phoneNr',$phoneNr,PDO::PARAM_STR);
                $stmt->bindParam(':address',$address,PDO::PARAM_STR);
                $stmt->bindParam(':idCustomer',$_SESSION['username'],PDO::PARAM_STR);
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


    
    