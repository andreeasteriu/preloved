<?php
 require_once(__DIR__ . '/db-connect.php'); 

if($_POST){

    if (empty($_POST['email']) || empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['password']) || empty($_POST['repeatPassword']) || empty($_POST['phoneNr']) || empty($_POST['userName']) || empty($_POST['address'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__ );   
    }
    
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        sendErrorMessage('* Email is not valid', __LINE__ );
    }

    if (!preg_match("/^[a-zA-Z]*$/", $_POST['firstName'])) {
        sendErrorMessage('* First Name is not valid', __LINE__ );
    }

    if (!preg_match("/^[a-zA-Z]*$/", $_POST['lastName'])) {
        sendErrorMessage('* Last Name is not valid', __LINE__ );
    }

    if (!preg_match("/^[0-9]{8}+$/", $_POST['phoneNr'])) {
        sendErrorMessage('* Phone Number is not valid', __LINE__ );
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['userName'])) {
        sendErrorMessage('* User name is not valid', __LINE__ );
    }
    
    if (strlen($_POST['password']) < 6) {
        sendErrorMessage('* Password too small', __LINE__ );
    }
   
    if ($_POST['password'] !== $_POST['repeatPassword']) {
        sendErrorMessage('* Passwords do not match', __LINE__ );
    }
}       


$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$phoneNr = mysqli_real_escape_string($conn, $_POST['phoneNr']);
$userName =  mysqli_real_escape_string($conn, $_POST['userName']);
$address = mysqli_real_escape_string($conn,  $_POST['address']);
$date = date('Y-m-d H:i:s');


    $sql = "SELECT email, userName FROM customers WHERE email=? OR userName=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        sendErrorMessage('* sql error', __LINE__ );
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $email, $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0) {
            sendErrorMessage('* user taken', __LINE__ );
        }
        else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO customers (`email`,`firstName`,`lastName`,`password`,`phoneNr`,`joiningDate`,`userName`,`address`) 
            VALUES ('$email','$firstName','$lastName','$hashedPassword','$phoneNr','$date','$userName','$address');";
            // mysqli_query($conn, $sql);
            

            if ($conn->query($sql) == TRUE) {
                echo '{"status": 1, "message":"New record created successfully", "line":"'.__LINE__.'"}';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
               
            }

            $conn->close();
        }
    }


   
    function sendErrorMessage($sErrorMessage, $iLineNumber){
        echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
        exit;
    }


    
    



