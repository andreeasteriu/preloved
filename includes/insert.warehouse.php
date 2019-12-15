<?php
require_once(__DIR__ . '/db-connect.php');
session_start();

if ($_POST) {

    if (empty($_POST['address'])) {
        sendErrorMessage('* Please fill in all fields', __LINE__);
    }
}




//Getting Post Values
$address = $_POST['address'];

// Query for validation of username and email-id
$ret = "SELECT * FROM customers where idCustomer=:userName";
$queryt = $dbh->prepare($ret);
$queryt->bindParam(':userName', $_SESSION['username'], PDO::PARAM_STR);
$queryt->execute();
$results = $queryt->fetchAll(PDO::FETCH_OBJ);
if ($queryt->rowCount() == 1) {

    // Query for Insertion
    $sql = "INSERT INTO warehouses (`addressWarehouse`) 
            VALUES (:addressWarehouse)";
    $query = $dbh->prepare($sql);

    // Binding Post Values
    $query->bindParam(':addressWarehouse', $address, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo '{"status": 1, "message":"New record created successfully", "line":"' . __LINE__ . '"}';
    } else {
        sendErrorMessage('* Something went wrong, please try again', __LINE__);
    }
} else {
    sendErrorMessage('* User or email already exist', __LINE__);
}




function sendErrorMessage($sErrorMessage, $iLineNumber)
{
    echo '{"status": 0, "message":"' . $sErrorMessage . '", "line": ' . $iLineNumber . '}';
    exit;
}
