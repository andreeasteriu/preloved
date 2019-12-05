<?php
    require_once(__DIR__ . '/db-connect.php'); 


if($_POST){ 

    if (empty($_POST['username']) || empty($_POST['password'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__ );   
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])) {
        sendErrorMessage('* User name is not valid', __LINE__ );
    }
    if (strlen($_POST['password']) < 6) {
        sendErrorMessage('* Wrong Password', __LINE__ );
    }



    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            sendErrorMessage('* does not search in database for match', __LINE__ );
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username) ;
            mysqli_stmt_execute($stmt);
            $result =  mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    sendErrorMessage('* wrong password', __LINE__ );
                }
                else if($passCheck == true){
                    session_start();
                    $_SESSION['username'] = $row['userName'];
                    echo '{"status": 1, "message":"You logged in.", "line":"'.__LINE__.'"}';

        
                }else {
                    sendErrorMessage('* wrong password', __LINE__ );
                }
            }else {
                sendErrorMessage('* user does not exist - register', __LINE__ );
            }
           
        }

    }

function sendErrorMessage($sErrorMessage, $iLineNumber){
    echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
    exit;
}



  
    
        
