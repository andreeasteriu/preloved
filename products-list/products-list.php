<?php
require_once(__DIR__ . '/../navigation/header.php');
require_once(__DIR__ . '/../includes/db-connect.php');
?>

<!-- navigation goes here -->
<div class="product-list-main">
    <div class="product-list-sidebar">
        <div class="product-list-sidebar-content">
            <div class="product-list-navigation">
                <ul>
                    <h3><a href="">Women</a></h3>
                    <div class="product-list-item">
                        <li><a href="">Coats</a></li>
                        <li><a href="">Jackets</a></li>
                        <li><a href="">Blazers</a></li>
                        <li><a href="">Dresses</a></li>
                        <li><a href="">Shirts | Tops</a></li>
                        <li><a href="">Trousers</a></li>
                        <li><a href="">Jeans</a></li>
                        <li><a href="">T-Shirts</a></li>
                        <li><a href="">Sweatshirts</a></li>
                        <li><a href="">Skirts | Shorts</a></li>
                        <li><a href="">Shoes</a></li>
                        <li><a href="">Bags</a></li>
                    </div>
                </ul>

                <ul>
                    <h3><a href="">Men</a></h3>
                    <div class="product-list-item">
                        <li><a href="">Coats</a></li>
                        <li><a href="">Jackets</a></li>
                        <li><a href="">Blazers</a></li>
                        <li><a href="">Suits</a></li>
                        <li><a href="">Shirts</a></li>
                        <li><a href="">Knitwear</a></li>
                        <li><a href="">Cashmere</a></li>
                        <li><a href="">Trousers</a></li>
                        <li><a href="">Shorts</a></li>
                        <li><a href="">Jeans</a></li>
                        <li><a href="">Tracksuits</a></li>
                        <li><a href="">Sweatshirts</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-list-products">
        <div class="product-list-products-header">

        </div>



                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<div class="product-list-products-filter">
<div class="container">
  <form action="" method="post">
    <div class="row">
        <div class="form-group">
            <select class="form-control" name="size">
                <option value="">SELECT SIZE</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>

        <div class="form-group">
            <select class="form-control" name="brand">
                <option value ="">SELECT BRAND</option>
                <option value="ZARA">ZARA</option>
                <option value="H&M">H&M</option>
                <option value="Calvin Klein">Calvin Klein</option>
                <option value="Versace">Versace</option>
                <option value="Levis">Levis</option>
                <option value="Gucci">Gucci</option>
                <option value="Nike">Nike</option>
            </select>
        </div>
    
	        <div class="form-group">
            <select class="form-control" name="condition">
                <option value="">SELECY CONDITION</option>
                <option value="Good">Good</option>
                <option value="Very Good">Very Good</option>
                <option value="Not That Good">Not That Good</option>
            </select>
        </div>
    </div>
	<button type="submit" class="btn btn-primary">Apply</button>
</form>
</div>
</div>
<div class="product-list-products">
<div class="container-fluid">
    <div class="row"><?php

		$size = $_POST['size'];
		$brand = $_POST['brand'];
		$condition = $_POST['condition'];
		include '../includes/db-connect.php';
		if(isset($_POST['size']) && isset($_POST['brand']) && isset($_POST['condition'])) { $sql = "SELECT * FROM products
		WHERE size ='$size' AND condition = $condition AND brand ='$brand'"; }
		if(isset($_POST['size']) && isset($_POST['brand']) && $_POST['condition']==NULL){
			$sql = "SELECT * FROM products
		WHERE size ='$size' AND brand ='$brand'";
		}
		if(isset($_POST['brand']) && isset($_POST['condition']) && $_POST['size']==NULL){
			$sql = "SELECT * FROM products
		WHERE condition = '$condition' AND brand ='$brand'";
		}
		if(isset($_POST['size']) && isset($_POST['condition']) && $_POST['brand']==NULL){
			$sql = "SELECT * FROM products
		WHERE size ='$size' AND condition = '$condition'";
		}
		if(isset($_POST['brand']) && $_POST['condition']==NULL && $_POST['size']==NULL){
			$sql = "SELECT * FROM products
		WHERE brand ='$brand'";
		}
		if($_POST['brand']==NULL && isset($_POST['condition']) && $_POST['size']==NULL){
			$sql = "SELECT * FROM products
		WHERE condition = '$condition'";
		}
		if($_POST['brand']==NULL && $_POST['condition']==NULL && isset($_POST['size'])){
			$sql = "SELECT * FROM products
		WHERE size ='$size'";
		}
		if($_POST['brand']==NULL && $_POST['condition']==NULL && $_POST['size']==NULL){
			$sql = "SELECT * FROM products";
		}
		$result = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($result);
		  if($num > 0) while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 

                echo '<div class="product-list-products-item"><div class="product-list-products-item-details">'
                    . '<div class="product-list-products-item-image">
                        <img src="../pictures/product-list-product-placeholder.png">
                        <div class="product-list-products-item-image-overlay"></div>
                    </div>'
                    . '<div><p>' . $row['title'] . '</p></div>'
                    . '<div><p>' . $row['price'] . ' kr.</p></div>'
                    . '</div></div>';
            }else{
			   echo "<h4>No Result Found</h4>"; } ?>
      
</div>
</div>
</div>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  
