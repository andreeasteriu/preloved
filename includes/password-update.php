<?php
    require_once(__DIR__ . '/db-connect.php'); 


if($_POST){ 

    if (empty($_POST['repeatPassword']) || empty($_POST['password']) || empty($_POST['oldPassword'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__ );   
    }
  
    if (strlen($_POST['password']) < 6) {
        sendErrorMessage('* Wrong Password', __LINE__ );
    }

    if (strlen($_POST['oldPassword']) < 6) {
        sendErrorMessage('* Wrong Password', __LINE__ );
    }

    if ($_POST['password'] !== $_POST['repeatPassword']) {
        sendErrorMessage('* Passwords do not match', __LINE__ );
    }

$password = $_POST['password'];
$oldPassword = $_POST['oldPassword'];

$sql="SELECT * FROM customers where userName=:oldPassword";
$stmt = $dbh -> prepare($sql);
$stmt->bindParam(':oldPassword',$oldPassword,PDO::PARAM_STR);
$stmt -> execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        $passCheck = password_verify($password, $row['oldPassword']);
            if ($passCheck == false) {
                sendErrorMessage('* wrong password', __LINE__ );
            }
            else if($passCheck == true){
                session_start();
                $_SESSION['username'] = $row['idCustomer'] ;
                echo '{"status": 1, "message":"You logged in id = '.$_SESSION['username'].'", "line":"'.__LINE__.'"}';
    } 
} else {
    sendErrorMessage('* Invalid username and password', __LINE__ );
}
    
    

}

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}

