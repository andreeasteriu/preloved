<?php
require_once(__DIR__ . '/../includes/db-connect.php');
$sPageName = "Confirm transaction";
session_start();
if (isset($_SESSION['username'])) {
    require_once(__DIR__ . '/../navigation/header-logout.php');
}

if (empty($_SESSION)) {
    require_once(__DIR__ . '/../navigation/header.php');
}
?>
<link rel="stylesheet" href="audit.css">

<?php
$stmt = $dbh->prepare("SELECT * FROM products where idProduct = ?");
if ($stmt->execute(array($_GET['id']))) {
    while ($row = $stmt->fetch()) {

        echo '<div class="audit_box">
                        <div class="audit_info">THANK YOU FOR CHOOSING <span style="color: #e6e6e6;">PRE</span><span style="color: #e8a798;">LOVED. </span>PRODUCT</div>
                        <div class="audit_product">' . $row['title'] . '</div>
                        <div class="audit_price">' . $row['price'] . 'kr.</div>
                        <div class="audit_text">Pick up the item at</div>
                        <div class="audit_text2">WAREHOUSE 1</div>
                        <div class="audit_text3">Lygten 16, 2300 Copenahgen S</div>';
    }
}
echo '<div class="audit_choice">Choose the card to proceed with the payment</div>
                <div class="checkbox">';

$stmt = $dbh->prepare("SELECT * FROM creditcards where idCustomer = ?");
if ($stmt->execute(array($_SESSION['username']))) {
    while ($row = $stmt->fetch()) {
        echo '<form method="post"><label><input name="idCreditcard" value="' . $row['idCreditCard'] . '" 
        name="creditcard" id="creditcard-list" 
        type="radio" onclick="onlyOne(this)">' . $row['ibanCode'] . '</label>';
    }
}

echo '</div>';


if (!$_POST) {
    echo '
        <button name="audit-buy-button"> Buy </button> </form>';
} else {

    try {
        $sql = 'CALL transaction(?, ?, ?)';
        $stmt = $dbh->prepare($sql);

        $customer = $_SESSION['username'];
        $creditCard = $_POST['idCreditcard'];
        $product = $_GET['id'];

        $stmt->bindParam(1, $customer, PDO::PARAM_STR | PDO::PARAM_INT, 11);
        $stmt->bindParam(2,  $creditCard, PDO::PARAM_INT, 11);
        $stmt->bindParam(3, $product, PDO::PARAM_INT, 11);

        $stmt->execute();
        echo '<p>Transaction complete! Thank you for purchasing</p>
        <h3><a href="../main/index.php">To return to the front page, click here</a></h3>';
    } catch (PDOException $pe) {
        die("Error occurred:" . $pe->getMessage());
    }
}


?>



</div>
<script>
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByID('creditcard-list')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>