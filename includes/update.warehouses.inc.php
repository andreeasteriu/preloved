<?php
session_start();

require_once(__DIR__ . '/db-connect.php');


$address = $_POST['address'];
$name = $_POST['name'];
$warehouse = $_POST['idWarehouse'];


$sql = "SELECT * FROM customers WHERE idCustomer=:idCustomer";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':idCustomer', $_SESSION['username'], PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($count == 1 && !empty($row)) {

    $sql = "UPDATE warehouses SET addressWarehouse=:address, nameWarehouse=:name 
                    WHERE idWarehouse=:idWarehouse";
    if ($stmt = $dbh->prepare($sql)) {

        // Binding Post Values
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':idWarehouse', $warehouse, PDO::PARAM_STR);
        $stmt->execute();
        echo '{"status": 1, "message":"New record updated successfully", "line":"' . __LINE__ . '"}';
        header("Location: http://localhost/preloved/profile/warehouses.php");
    } else {
        sendErrorMessage('* sql error', __LINE__);
    }
} else {
    sendErrorMessage('* no user found', __LINE__);
}
function sendErrorMessage($sErrorMessage, $iLineNumber)
{
    echo '{"status": 0, "message":"' . $sErrorMessage . '", "line": ' . $iLineNumber . '}';
    exit;
}
