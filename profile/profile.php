<?php
$sPageName = "Profile";
session_start();
if(isset($_SESSION['username'])){
    require_once(__DIR__ . '/../navigation/header-logout.php');
} 

if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');
}
?>  
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous">

<div class="body-profile">
    <section class="profile">
        <div class="profile-about-container">
            <div class="profile-pink-container"></div>
            <div class="profile-image"></div>
            <h3 class="profile-name">Andreea Steriu</h3>
            <div class="profile-links">
            <a href="sell-clothes.php" class="profile-link sell"><img class="" src="../graphics/eye.svg"> Sell your clothes</a>
            <a href="view-clothes.php" class="profile-link view"><img class="profile-icon" src="../graphics/payment-method.svg"> View your clothes</a>
            </div>
            <p class="profile-description">
                Ut labore et dolore roipi mana aliqua. Ut enim adeop minim veeniam, quis nostruklad.
            </p>
            <div class="info">
                <p class="info-phone-nr"><b>Phone</b> +45 50 65 44 17</p>
                <p class="info-address"><b>Address</b> Gronjordsvej 3</p>
                <p class="info-clothes-sold"><b>Clothes Sold</b> 4</p>
                <p class="info-credit-card"><b>Debit Card</b>  *************4051 Visa</p>
                <p class="info-desc">Annual plan, paid monthly. <br>
                Automatically renewed on November 1, 2020</p>
            </div>
            <button class="manage-plan"><img src="../graphics/card.svg"> Manage Profile</button>
        </div>
        <div class="profile-sell-container">
        </div> 
        <div class="profile-products-container">
        </div>
    </section>
    <section class="sell-your-clothes">
        <h2 class="sell-your-clothes-title">Sell your clothes.</h2>
        <form id="upload-form" class="sell-your-clothes-form" method="POST" enctype="multipart/form-data">
        <label class="sell-your-clothes-file-upload">
             <input type="file"/>
                <i class="fa fa-cloud-upload"></i> ADD PICTURE
        </label>
        <input id="txtTitle" class="sell-your-clothes-input" name="txtTitle" type="text" data-type="string" data-min="3" data-max="3000" value="" placeholder="Title">
        <input id="txtDescription" class="sell-your-clothes-input" name="txtDescription" type="text" data-type="string" data-min="3" data-max="3000" value="" placeholder="Description">
        <input id="txtSize" class="sell-your-clothes-input" name="txtSize" type="text" data-type="string" data-min="1" data-max="3" value="" placeholder="Size">
        <input id="txtBrand" class="sell-your-clothes-input" name="txtBrand" type="text" data-type="string" data-min="3" data-max="3000" value="" placeholder="Brand">
        <input id="txtCondition" class="sell-your-clothes-input" name="txtCondition" type="text" data-type="string" data-min="3" data-max="3000" value="" placeholder="Condition">
        <input id="txtPrice" class="sell-your-clothes-input" name="txtPrice" type="number" data-type="integer" data-min="1" data-max="999999999" value="" placeholder="Price">
        <button type="submit" class="sell-your-clothes-submit" onclick="return uploadCheck(this);" id="btn_upload"><img src="../graphics/upload.svg"> Upload Product</button>    
    </form>   
    </section>

    <section class="view-clothes">
        <div class="view-clothes-container">
            <span class="view-clothes-wrap">
                <img src="../graphics/mock-up-clothes.svg" alt="" class="view-clothes-image">
                <button class="view-clothes-edit"><img src="../graphics/edit.svg" alt=""></button>
                <button class="view-clothes-delete"><img src="../graphics/delete.svg" alt=""></button>
            </span>
            <span class="view-clothes-inputs">
            <p>Title.</p><input data-update="title" name="txtTitle" type="text" data-type="string" data-min="3" data-max="3000" value="Fine knit sweater">
            <p>Description.</p> <input data-update="description" name="txtDescription" type="text" data-type="string" data-min="3" data-max="3000" value="Fine knit sweater…">
            <p>Size.</p><input data-update="size" name="txtSize" type="text" data-type="string" data-min="1" data-max="3" value="XL">
            <p>Brand.</p><input data-update="brand" name="txtBrand" type="text" data-type="string" data-min="3" data-max="3000" value="H&M">
            <p>Condition.</p><input data-update="condition" name="txtCondition" type="text" data-type="string" data-min="3" data-max="3000" value="Very Good">
            <p>Price.</p><input data-update="price" name="txtPrice" type="number" data-type="integer" value="20">
            </span>
        </div>
        <div class="view-clothes-container">
            <span class="view-clothes-wrap">
                <img src="../graphics/mock-up-clothes.svg" alt="" class="view-clothes-image">
                <button class="view-clothes-edit"><img src="../graphics/edit.svg" alt=""></button>
                <button class="view-clothes-delete"><img src="../graphics/delete.svg" alt=""></button>
            </span>
            <span class="view-clothes-inputs">
            <p>Title.</p><input data-update="title" name="txtTitle" type="text" data-type="string" data-min="3" data-max="3000" value="Fine knit sweater">
            <p>Description.</p> <input data-update="description" name="txtDescription" type="text" data-type="string" data-min="3" data-max="3000" value="Fine knit sweater…">
            <p>Size.</p><input data-update="size" name="txtSize" type="text" data-type="string" data-min="1" data-max="3" value="XL">
            <p>Brand.</p><input data-update="brand" name="txtBrand" type="text" data-type="string" data-min="3" data-max="3000" value="H&M">
            <p>Condition.</p><input data-update="condition" name="txtCondition" type="text" data-type="string" data-min="3" data-max="3000" value="Very Good">
            <p>Price.</p><input data-update="price" name="txtPrice" type="number" data-type="integer" value="20">
            </span>
        </div>
    </section>

</div>
<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  