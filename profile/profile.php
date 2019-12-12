<?php
$sPageName = "Profile";
require_once(__DIR__ . '/../includes/db-connect.php');

session_start();

if (isset($_SESSION['username'])) {
    require_once(__DIR__ . '/../navigation/header-logout.php');
}
if (empty($_SESSION)) {
    require_once(__DIR__ . '/../navigation/header.php');
}
?>

<!-- **************************** PROFILE SECTION ******************************** -->
<?php
$sql = "SELECT customers.idCustomer,firstName,lastName,phoneNr,password,address,ibanCode 
        FROM customers
        LEFT JOIN creditcards 
        ON customers.idCustomer = creditcards.idCustomer 
        WHERE customers.idCustomer=:idCustomer";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':idCustomer', $_SESSION['username'], PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="profile.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="body-profile">
    <section class="profile">
        <form id="profileInfo" class="profile-about-container" action="" method="POST">
            <div class="profile-pink-container"></div>
            <div class="profile-image"></div>
            <h3 class="profile-name-wrap"><input data-update="newFirstName" type="text" name="firstName" class="edit-inputs profile-name" maxlength="60" data-type="string" data-min="1" data-max="60" placeholder="First Name" value="<?= $row['firstName']; ?>"><input data-update="newLastName" type="text" name="lastName" class="edit-inputs profile-name" maxlength="60" data-type="string" data-min="1" data-max="60" placeholder="Last Name" value="<?= $row['lastName']; ?>"></h3>
            <div class="profile-links">
                <a href="sell-clothes.php" class="profile-link sell"><img class="" src="../graphics/eye.svg"> Sell your clothes</a>
                <a href="view-clothes.php" class="profile-link view"><img class="profile-icon" src="../graphics/payment-method.svg"> View your clothes</a>
            </div>
            <p class="profile-description">
                Hi! Welcome to my profile. I love sustainabilty and I have a lot of clothes to share with you, guys.
            </p>
            <div class="info">
                <p><b>Phone</b> <input data-update="newPhoneNr" type="text" name="phoneNr" class="edit-inputs" placeholder="Phone Number" minlength="8" maxlength="8" data-min="8" data-max="8" data-type="string" value="<?= $row['phoneNr']; ?>"></p>
                <p><b>Address</b> <input data-update="newAddress" type="text" name="address" class="edit-inputs" maxlength="100" data-type="string" data-min="5" data-max="100" placeholder="Address" value="<?= $row['address']; ?>"></p>
                <div class="parag-wrap"><p><b>Password</b><div id="btnUploadCreditCard"><a href="../login/password.php"><img src='../graphics/add-creditcard.svg'></a></div></p></div>
                <p><b>Clothes Sold</b> 4</p>
                <div class="parag-wrap"><p><b>Credit Card</b><div id="btnUploadCreditCard"><a href="../login/credit-card.php"><img src='../graphics/add-creditcard.svg'></a></div></p></div>
                <!-- <div class="manage-plan creditcardbtn"><img src="../graphics/card.svg"> Upload Credit Card</div> -->
                <p class="info-desc">Annual plan, paid monthly. <br>
                    Automatically renewed on November 1, 2020</p>
            </div>
            <div class="container-grid-buttons">
            <div id="clicker" class="manage-plan" name="update"><img src="../graphics/edit.svg"> Manage Profile</div>
            <div id="clicker-delete" class="manage-plan" name="update"><a href="../includes/delete.profile.php" class="profile-delete-link"><img src="../graphics/delete.svg"> Delete Profile</a></div>

            </div>
        </form>

        <!-- <input type="text" name="creditcard" class="insert-input" placeholder="Credit Card" minlength="22" maxlength="22" data-type="string" data-min="22" data-max="22" value="<?= $row['ibanCode']; ?>"> -->
        <!-- **************************** SELL YOUR CLOTHES SECTION ******************************** -->



        <div class="profile-sell-container">
        </div>
        <div class="profile-products-container">
        </div>
    </section>
    <section class="sell-your-clothes">
        <h2 class="sell-your-clothes-title">Sell your clothes.</h2>
        <form id="upload-clothes-form" class="sell-your-clothes-form" method="POST" enctype="multipart/form-data">
            
            <input class="sell-your-clothes-input" id="file" type="file" name="image"/>
            <input class="sell-your-clothes-input" name="title" type="text" data-type="string" data-min="3" data-max="40" value="" placeholder="Title">
            <input class="sell-your-clothes-input" name="description" type="text" data-type="string" data-min="3" data-max="255" value="" placeholder="Description">
            <select class="" name="category">
                        <option value="">Category</option>
                        <option value="1">Coats</option>
                        <option value="2">Jackets</option>
                        <option value="3">Blazers</option>
                        <option value="4">Dresses</option>
                        <option value="5">Suits</option>
                        <option value="6">Shirts</option>
                        <option value="7">Knitwears</option>
                        <option value="8">Trousers</option>
                        <option value="9">Jeans</option>
                        <option value="10">T-shirts</option>
                        <option value="11">Shorts</option>
                        <option value="12">Skirts</option>
                        <option value="13">Tracksuits</option>
                        <option value="14">Shoes</option>
                        <option value="15">Bags</option>
                        
                        
            </select>      
            <select name="size">
                <option value="">Size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
            <select class="" name="brand">
                        <option value="">Brand</option>
                        <option value="2">ZARA</option>
                        <option value="1">H&M</option>
                        <option value="3">Calvin Klein</option>
                        <option value="4">Versace</option>
                        <option value="5">Levis</option>
                        <option value="7">Gucci</option>
                        <option value="6">Nike</option>
                        <option value="8">Other</option>
            </select>
            <select class="" name="condition">
                        <option value="">Condition</option>
                        <option value="Not That Good">Not That Good</option>
                        <option value="Good">Good</option>
                        <option value="Very Good">Very Good</option>
                        
            </select>
            <input class="sell-your-clothes-input" name="price" type="number" data-type="integer" data-min="1" data-max="9999999" value="" placeholder="Price">
            <select class="" name="warehouses">
                        <option value="">Warehouses</option>
                        <option value="1">923 Nunc Av.</option>
                        <option value="2">Ap #116-7636 Erat Road</option>
                        <option value="3">282-728 Tempor Rd.</option>
                        <option value="4">5940 Curae; Ave</option>
                        <option value="5">132-7258 Id St.</option>
                        <option value="6">Ap #310-4201 Parturient Ave</option>
                        <option value="7">734-967 Imperdiet, Ave</option>
                        
            </select> 
            <span class="radio-wrap">
            <span><input type="radio" name="gender" value="f" checked="checked" /><b>Female </b></span>    
            <span><input type="radio" name="gender" value="m" checked="checked" /><b>Male</b></span> 
            </span>
            <div id="error_message"></div>
            <button type="submit" class="sell-your-clothes-submit" onclick="return uploadCheck(this);" id="btn_upload"><img src="../graphics/upload.svg"> Upload Product</button>
        </form>
    </section>


    <!-- **************************** VIEW THE PRODUCTS SECTION ******************************** -->


    <section class="view-clothes">

        <?php

        $stmt = $dbh->prepare("SELECT idCustomer,image,title,description,price,size,products.condition,brands.idBrand,brands.brandName 
                                FROM products 
                                LEFT JOIN brands 
                                ON products.idBrand = brands.idBrand 
                                WHERE products.idCustomer= ?");
        if ($stmt->execute(array($_SESSION['username']))) {
            while ($row = $stmt->fetch()) {

                echo ' <div class="view-clothes-container">
            <span class="view-clothes-wrap">
                <img class="view-clothes-image" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '">
                <button class="view-clothes-edit"><img src="../graphics/edit.svg" alt=""></button>
                <button class="view-clothes-delete"><img src="../graphics/delete.svg" alt=""></button>
            </span>
            <span class="view-clothes-inputs">
            <p>Title.</p><input data-update="title" name="txtTitle" type="text" data-type="string" data-min="3" data-max="3000" value="' . $row['title'] . '">
            <p>Description.</p> <input data-update="description" name="txtDescription" type="text" data-type="string" data-min="3" data-max="3000" value="' . $row['description'] . '">
            <p>Size.</p><input data-update="size" name="txtSize" type="text" data-type="string" data-min="1" data-max="3" value="' . $row['size'] . '">
            <p>Brand.</p><input data-update="brand" name="txtBrand" type="text" data-type="string" data-min="3" data-max="3000" value="' . $row['brandName'] . '">
            <p>Condition.</p><input data-update="condition" name="txtCondition" type="text" data-type="string" data-min="3" data-max="3000" value="' . $row['condition'] . '">
            <p>Price.</p><input data-update="price" name="txtPrice" type="number" data-type="integer" value="' . $row['price'] . '">
            </span>
        </div>';
            }
        }
        ?>

    </section>


</div>
<script src="../validate.js"></script>
<script>


   /************************* PROFILE SECTION ***************************** */ 
$('.edit-inputs').attr({'disabled': 'disabled'})
                .css("border", "none");
$('#btnUploadCreditCard').css("display", "none");


$().ready(function() {
    $('#clicker').click(function() {
        $('.edit-inputs').each(function() {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
                $(this).css({'background':'none', "border":"1px solid #e6e6e6",  'padding':'.5em'});
                $('#btnUploadCreditCard').css("display", "block"); 
                $('#clicker').html("<img src='../graphics/edit.svg'> Save Profile");
            }
            else {
                $(this).attr({'disabled': 'disabled'});
                $(this).css( "border","none");
                $('#btnUploadCreditCard').css("display", "none");
                $('#clicker').html("<img src='../graphics/edit.svg'> Manage Profile");
                };
            
        });   

    });
});


   


    $(document).on('blur', '.profile-about-container input', function(event) {
        event.preventDefault()
        // console.log($('#profileInfo').serialize())
        $.ajax({
                url: "../includes/update.inc.php",
                method: "POST",
                data: $('#profileInfo').serialize(), // create the form to be passed
                dataType: "JSON"
            })
            .done(function() {
                console.log('User has been updated')
            })
    });


</script>
<script src="profile.js"></script>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  

