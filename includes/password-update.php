<?php
    require_once(__DIR__ . '/db-connect.php'); 

session_start();

if($_POST){ 

    if (empty($_POST['repeatPassword']) || empty($_POST['password']) || empty($_POST['oldPassword'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__ );   
    }
  
    if (strlen($_POST['password']) < 6) {
        sendErrorMessage('* New password too short', __LINE__ );
    }

    if (strlen($_POST['oldPassword']) < 6) {
        sendErrorMessage('* Old password does not match', __LINE__ );
    }

    if ($_POST['password'] !== $_POST['repeatPassword']) {
        sendErrorMessage('* Passwords do not match', __LINE__ );
    }

$password = $_POST['password'];
$oldPassword = $_POST['oldPassword'];

$sql="SELECT * FROM customers where idCustomer=:idCustomer";
$stmt = $dbh -> prepare($sql);
$stmt->bindParam('idCustomer',$_SESSION['username'],PDO::PARAM_STR);
$stmt -> execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        $passCheck = password_verify($oldPassword, $row['password']);
            if ($passCheck == false) {
                sendErrorMessage('* wrong password', __LINE__ );
            }
            else if($passCheck == true){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE customers SET password=:newpassword
                    WHERE idCustomer=:idCustomer";
                $stmt = $dbh->prepare($sql);
               
                 // Binding Post Values
                $stmt->bindParam(':newpassword',$hashedPassword,PDO::PARAM_STR);
                $stmt->bindParam(':idCustomer',$_SESSION['username'],PDO::PARAM_STR);
                $stmt -> execute();
               
                echo '{"status": 1, "message":"Password changed", "line":"'.__LINE__.'"}';
    } 
} else {
    sendErrorMessage('* Invalid username and password', __LINE__ );
}
    
    

}

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}

