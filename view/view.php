<?php
$sPageName = "Product Description";
require_once(__DIR__ . '/../includes/db-connect.php');
session_start();
if (isset($_SESSION['username'])) {
  require_once(__DIR__ . '/../navigation/header-logout.php');
}
if (empty($_SESSION)) {
  require_once(__DIR__ . '/../navigation/header.php');
}
?>
<link rel="stylesheet" href="view.css">
<div class="view_grid">

  <?php

  $stmt = $dbh->prepare("SELECT idProduct, title, description, image, size, products.condition, BrandName, categoryName 
                          FROM products 
                          LEFT JOIN brands 
                          ON products.idBrand = brands.idBrand 
                          INNER JOIN categories 
                          ON products.idCategory = categories.idCategory 
                          WHERE idProduct = ?");
  if ($stmt->execute(array($_GET['id']))) {
    while ($row = $stmt->fetch()) {
      echo ' 
      <div class="view_picture">
        <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '">
      </div>
    <div class="view_column"> 
  <div class="view_title">' . $row['title'] . '</div>
  <div class="view_description">' . $row['description'] . '</div>
  <hr noshade size="2" color="#E6E6E6">
    <div class="details_column">
        <div class="details_first"> 
            <div class="view_detail">SIZE</div>
            <div class="view_detail">BRAND</div>
            <div class="view_detail">CATEGORY</div>
            <div class="view_detail">CONDITION</div>
            
        </div>
        <div class="details_second"> 
            <div class="view_detail2">' . $row['size'] . '</div>
            <div class="view_detail2">' . $row['BrandName'] . '</div>
            <div class="view_detail2">' . $row['categoryName'] . '</div>
            <div class="view_detail2">' . $row['condition'] . '</div>
        </div>
       
    </div>
    <hr noshade size="2" color="#E6E6E6">
    <div class="price">200 DKK</div>
    <div class="add_button"><button><a href="../audit/audit.php?id=' . $row['idProduct'] . '">Buy</a></button></div>
  </div>';
    }
  } ?>
</div>

<div id='other'><span style="color: #e6e6e6;">OTHER </span><span style="color: #e8a798;">ITEMS.</span></div>
<div class="other_grid">
  <div class="one">
    <a href="view.php?id=5">
      <div class="other_column" style="background-image: url('../pictures/1.png');"></div>
    </a>
    <div class="text">Fine knit sweater in alpaca mix</div>
    <div class="text_price">699 DKK</div>
  </div>
  <div class="one">
    <a href="view.php?id=4">
      <div class="other_column" style="background-image: url('../pictures/3.png');"></div>
    </a>
    <div class="text">Fine knit sweater in alpaca mix</div>
    <div class="text_price">699 DKK</div>
  </div>
  <div class="one">
    <a href="view.php?id=3">
      <div class="other_column" style="background-image: url('../pictures/5.png');"></div>
    </a>
    <div class="text">Fine knit sweater in alpaca mix</div>
    <div class="text_price">699 DKK</div>
  </div>
  <div class="one">
    <a href="view.php?id=2">
      <div class="other_column" style="background-image: url('../pictures/4.png');"></div>
    </a>
    <div class="text">Fine knit sweater in alpaca mix</div>
    <div class="text_price">699 DKK</div>
  </div>

</div>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>

