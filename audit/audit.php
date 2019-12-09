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
$sql = "SELECT * FROM products WHERE products.idProduct = {$_GET['id']};";

$result = mysqli_query($conn, $sql);

$resultCheck = mysqli_num_rows($result);

$sql2 = 'SELECT * FROM creditcards WHERE creditcards.idcustomer = 1 ;';
$result2 = mysqli_query($conn, $sql2);
$resultCheck2 = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
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

if ($resultCheck2 > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        echo '<label><input value="' . $row['idCreditCard'] . '" 
        name="creditcard" id="creditcard-list" 
        type="radio" onclick="onlyOne(this)">' . $row['ibanCode'] . '</label>';
    }
}

echo '</div>';


if (!$_POST) {
    echo '<form method="POST">
        <button name="audit-buy-button"> Buy </button> </form>';
} else {
    $sqlTransaction = 'CALL transaction (1,1,' . $_GET['id'] . ');';


    if (mysqli_query($conn, $sqlTransaction)) {
        echo '<p>Transaction complete! Thank you for purchasing</p>
        <h3><a href="../main/index.php">To return to the front page, click here</a></h3>';
    } else {
        echo 'We are sorry, an error has occured.';
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