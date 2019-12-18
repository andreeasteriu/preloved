<?php
$sPageName = "";
session_start();
if (isset($_SESSION['username'])) {
  require_once(__DIR__ . '/../navigation/header-logout.php');
}

if (empty($_SESSION)) {
  require_once(__DIR__ . '/../navigation/header.php');
}


?>

<link rel="stylesheet" href="index.css">


  <div id='picture'>
    <div class="container-hero-text">
    <div id="main_title"><span style="color: #e6e6e6;">PRE</span><span style="color: #e8a798;">LOVED.</span></div>
    <div id='title_description'>Are you ready to show off your new wardrobe?</div>
    </div>
    <div id="main_row">
      <div id="main_column1">
        <div id='title1'>
          <div class="main_description"><a href="../products-list/products-list.php" class="grid-desc">BUY<img class="pay-buy-icon" src="../graphics/pay-buy.svg" alt=""></a></div>
        </div>
        <div id='text1'>Are you ready to buy? Here you can find preloved <br> clothes at attractive prices. </div>
      </div>
      <div id="main_column2">
        <div id='title2'>
          <div class="main_description"><a href="../products-list/products-list.php" class="grid-desc">SELL <img class="pay-buy-icon" src="../graphics/pay-buy.svg" alt=""></a></div>
        </div>
        <div id='text2'>Sell your preloved clothes and help the environment to breath.</div>
      </div>

    </div>
  
</div>

<div id='category'><span style="color: #e6e6e6;">CAT</span><span style="color: #e8a798;">EGORIES.</span></div>
<div class="category_grid">
  <div class="column" style="background-image: url('../pictures/1.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=&category=9&size=&brand=">JEANS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/2.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=&category=10&size=&brand=">T-SHIRTS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/3.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=&category=2&size=&brand=">JACKETS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/4.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=&category=11&size=&brand=">SKIRTS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/5.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=&category=2&size=&brand=">HOODIES</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/6.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=&category=7&size=&brand=">KNITS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/7.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=&category=8&size=&brand=">PANTS</a></div>
  </div>
  <div class="column" style="background-image: url('../pictures/8.png');">
    <div class="cat_title"><a href="../products-list/products-list.php?gender=1&category=4&size=&brand=">DRESSES</a></div>
  </div>

</div>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>