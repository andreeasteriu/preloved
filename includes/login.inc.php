<?php
    require_once(__DIR__ . '/db-connect.php'); 


if($_POST){ 

    if (empty($_POST['userName']) || empty($_POST['password'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__ );   
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['userName'])) {
        sendErrorMessage('* User name is not valid', __LINE__ );
    }
    if (strlen($_POST['password']) < 6) {
        sendErrorMessage('* Wrong Password', __LINE__ );
    }



$userName = $_POST['userName'];
$password = $_POST['password'];

$sql="SELECT * FROM customers where userName=:userName";
$stmt = $dbh -> prepare($sql);
$stmt->bindParam(':userName',$userName,PDO::PARAM_STR);
$stmt -> execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        $passCheck = password_verify($password, $row['password']);
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