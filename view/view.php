<?php
session_start();
if(isset($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');
    require_once(__DIR__ . '/../includes/db-connect.php');
    // echo "<div class='session-message'>Hi, {$_SESSION['user']->name}!</div>";
}
?>  
<link rel="stylesheet" href="view.css">
<div class="view_grid">
  <div class="view_picture" style="background-image: url('../pictures/1.png');"></div>
  <div class="view_column">
   <?php  
   
   $sql = "SELECT * FROM products WHERE idProduct = {$_GET['id']} ";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                if($num > 0) while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
echo'  
  <div class="view_title">'.$row['title'].'</div>
  <div class="view_description">'.$row['description'].'</div>
  <hr noshade size="2" color="#E6E6E6">
    <div class="details_column">
        <div class="details_first"> 
            <div class="view_detail">SIZE</div>
            <div class="view_detail">BRAND</div>
            <div class="view_detail">CATEGORY</div>
            <div class="view_detail">CONDITION</div>
            
        </div>
        <div class="details_second"> 
            <div class="view_detail2">'.$row['size'].'</div>
            <div class="view_detail2">'.$row['brand'].'</div>
            <div class="view_detail2">'.$row['idCategory'].'</div>
            <div class="view_detail2">'.$row['condition'].'</div>
        </div>
       
    </div>
    <hr noshade size="2" color="#E6E6E6">
    <div class="price">200 DKK</div>
    <div class="add_button"><button>ADD TO SHOPPING</button></div>
  </div>';}?>
</div>

  <div id='other'><span style="color: #e6e6e6;">OTHER </span><span style="color: #e8a798;">ITEMS.</span></div>
<div class="other_grid">
    <div class="one">
    <a href="#"><div class="other_column" style="background-image: url('../pictures/1.png');"></div></a>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
    <div class="one">
    <a href="#"><div class="other_column" style="background-image: url('../pictures/3.png');"></div></a>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
    <div class="one">
    <a href="#"><div class="other_column" style="background-image: url('../pictures/5.png');"></div></a>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
    <div class="one">
    <a href="#"><div class="other_column" style="background-image: url('../pictures/4.png');"></div></a>
        <div class="text">Fine knit sweater in alpaca mix</div>
        <div class="text_price">699 DKK</div>
  </div>
  
</div>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  