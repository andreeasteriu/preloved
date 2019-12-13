<?php
    require_once(__DIR__ . '/db-connect.php'); 

session_start();

if($_POST){ 

    if (empty($_POST['iban']) || empty($_POST['month']) || empty($_POST['year']) || empty($_POST['cvv']) || empty($_POST['password'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__ );   
    }
  
    if (strlen($_POST['password']) < 6) {
        sendErrorMessage('* Password too short', __LINE__ );
    }

    if (!preg_match("/^[A-Za-z0-9_ -]{18}+$/", $_POST['iban'])) {
        sendErrorMessage('* IBAN is not valid', __LINE__ );
    }

    if (!preg_match("/^[0-9]{3}+$/", $_POST['cvv'])) {
        sendErrorMessage('* CVV is not valid', __LINE__ );
    }
  
    if (strlen($_POST['month']) > 2) {
        sendErrorMessage('* Month too long', __LINE__ );
    }
    if (!preg_match("/^[0-9]*$/", $_POST['month'])) {
        sendErrorMessage('* Month is not valid', __LINE__ );
    }

    if (!preg_match("/^[0-9]{4}+$/", $_POST['year'])) {
        sendErrorMessage('* Year is not valid', __LINE__ );
    }

$iban = $_POST['iban'];
$month = $_POST['month'];
$year = $_POST['year'];
$cvv = $_POST['cvv'];
$password = $_POST['password'];

$sql="SELECT * FROM customers where idCustomer=:idCustomer";
$stmt = $dbh -> prepare($sql);
$stmt->bindParam('idCustomer',$_SESSION['username'],PDO::PARAM_STR);
$stmt -> execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        $passCheck = password_verify($password, $row['password']);
            if ($passCheck == false) {
                sendErrorMessage('* wrong password', __LINE__ );
            }
            else if($passCheck == true){
                $sql = "INSERT INTO creditcards (idCustomer, totalAmount, ibanCode, expirationDate, CVV) 
                        VALUES (:idCustomer, :totalAmount, :ibanCode, :expirationDate, :CVV)";
                 
                $stmt = $dbh->prepare($sql);
                $totalAmount = 0;
                $expirationDate = $year."-".$month."-01";
                 // Binding Post Values
                $stmt->bindParam(':idCustomer',$_SESSION['username'],PDO::PARAM_STR);
                $stmt->bindParam(':totalAmount',$totalAmount,PDO::PARAM_STR);
                $stmt->bindParam(':ibanCode',$iban,PDO::PARAM_STR);
                $stmt->bindParam(':expirationDate',$expirationDate,PDO::PARAM_STR);
                $stmt->bindParam(':CVV',$cvv,PDO::PARAM_STR);
                $stmt -> execute();
               
                echo '{"status": 1, "message":"*New credit card inserted", "line":"'.__LINE__.'"}';
    } 
} else {
    sendErrorMessage('* Invalid username and password', __LINE__ );
}
    
    

}

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}


