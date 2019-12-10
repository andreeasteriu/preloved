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

   
    //Getting Post Values
    $firstName =$_POST['firstName'];
    $lastName =$_POST['lastName'];
    $email =$_POST['email'];
    $password=$_POST['password'];    
    $phoneNr =$_POST['phoneNr'];
    $userName = $_POST['userName'];
    $address = $_POST['address'];
    $date = date('Y-m-d H:i:s');
   
    // Query for validation of username and email-id
    $ret="SELECT * FROM customers where (userName=:userName ||  email=:email)";
    $queryt = $dbh -> prepare($ret);
    $queryt->bindParam(':email',$email,PDO::PARAM_STR);
    $queryt->bindParam(':userName',$userName,PDO::PARAM_STR);
    $queryt -> execute();
    $results = $queryt -> fetchAll(PDO::FETCH_OBJ);
    if($queryt -> rowCount() == 0)
    {
    // Query for Insertion
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql="INSERT INTO customers (`email`,`firstName`,`lastName`,`password`,`phoneNr`,`joiningDate`,`userName`,`address`) 
            VALUES (:email,:firstName,:lastName,:password,:phoneNr,:joiningDate,:userName,:address)";
    $query = $dbh->prepare($sql);
    // Binding Post Values
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':firstName',$firstName,PDO::PARAM_STR);
    $query->bindParam(':lastName',$lastName,PDO::PARAM_STR);
    $query->bindParam(':password',$hashedPassword,PDO::PARAM_STR);
    $query->bindParam(':phoneNr',$phoneNr,PDO::PARAM_STR);
    $query->bindParam(':joiningDate',$date,PDO::PARAM_STR);
    $query->bindParam(':userName',$userName,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);


    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        echo '{"status": 1, "message":"New record created successfully", "line":"'.__LINE__.'"}';
    }
    else
    {
        sendErrorMessage('* Something went wrong, please try again', __LINE__ );
    }
    }
     else
    {
        sendErrorMessage('* User or email already exist', __LINE__ );
    }
    


   
    function sendErrorMessage($sErrorMessage, $iLineNumber){
        echo '{"status": 0, "message":"'.$sErrorMessage.'", "line": '.$iLineNumber.'}';
        exit;
    }


    
    



