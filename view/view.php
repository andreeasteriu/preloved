<?php
session_start();
if(isset($_SESSION['user'])){
    require_once(__DIR__ . '/../login/login-header.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
  
  } else if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');

  }
?>   
<link rel="stylesheet" href="view.css">

<div class="view_grid">
  <div class="view_picture" style="background-image: url('../pictures/1.png');"></div>
  <div class="view_column">
  <div class="view_title">KNITTED CARDIGAN WITH BUTTONS</div>
  <div class="view_description">Cardigan in knit with V-cut, long sleeves, rib hem and button closure in front.</div>
  <hr noshade size="2" color="#E6E6E6">
    <div class="details_column">
        <div class="details_first"> 
            <div class="view_detail">SIZE</div>
            <div class="view_detail">BRAND</div>
            <div class="view_detail">CONDITION</div>
        </div>
        <div class="details_second"> 
            <div class="view_detail2">XL</div>
            <div class="view_detail2">ZARA</div>
            <div class="view_detail2">GOOD</div>
        </div>
    </div>
    <hr noshade size="2" color="#E6E6E6">
    <div class="price">200 DKK</div>
    <div class="add_button"><button>ADD TO SHOPPING</button></div>
  </div>
</div>

  <div id='other'><span style="color: #e6e6e6;">OTHER </span><span style="color: #e8a798;">ITEMS.</span></div>
<div class="other_grid">
    <div class="one">
        <div class="other_column" style="background-image: url('../pictures/1.png');"></div>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
    <div class="one">
        <div class="other_column" style="background-image: url('../pictures/3.png');"></div>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
    <div class="one">
        <div class="other_column" style="background-image: url('../pictures/5.png');"></div>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
    <div class="one">
        <div class="other_column" style="background-image: url('../pictures/4.png');"></div>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
  
</div>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  