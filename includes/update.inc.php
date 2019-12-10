<?php
session_start();

require_once(__DIR__ . '/db-connect.php'); 
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$phoneNr = $_POST['phoneNr'];
$address =  $_POST['address'];

$sql = "SELECT * FROM customers WHERE idCustomer= ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        sendErrorMessage('* sql error', __LINE__ );
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck == 1) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE customers SET firstName=?, lastName=?, password=?, phoneNr=?, address=? WHERE idCustomer=?";
            // mysqli_query($conn, $sql);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                sendErrorMessage('* sql error', __LINE__ );
            }
            else {
                mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $hashedPassword, $phoneNr, $address, $_SESSION['username']);
                mysqli_stmt_execute($stmt);
                echo '{"status": 1, "message":"New record updated successfully", "line":"'.__LINE__.'"}';

            // $conn->close();
        }
    }
        else {
            sendErrorMessage('* no user found', __LINE__ );
        }
    }


   
    function sendErrorMessage($sErrorMessage, $iLineNumber){
        echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
        exit;
    }


    
    