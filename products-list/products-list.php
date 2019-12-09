<?php
$sPageName = "Products List";
session_start();
require_once(__DIR__ . '/../includes/db-connect.php');
if(isset($_SESSION['username'])){
    require_once(__DIR__ . '/../navigation/header-logout.php');
} 

if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');
}

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
        <form class="product-list-products-filter-content" action="" method="get">
           
                <div class="product-list-products-filter-input">
                    <select class="" name="size" >
                        <option value="">size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><img src="../graphics/filter.svg"></button>
                </div>

                <div class="product-list-products-filter-input">
                    <select class="" name="brand">
                        <option value="">brand</option>
                        <option value="ZARA">ZARA</option>
                        <option value="H&M">H&M</option>
                        <option value="Calvin Klein">Calvin Klein</option>
                        <option value="Versace">Versace</option>
                        <option value="Levis">Levis</option>
                        <option value="Gucci">Gucci</option>
                        <option value="Nike">Nike</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><img src="../graphics/filter.svg"></button>
                </div>

                <div class="product-list-products-filter-input">
                    <select class="" name="condition">
                        <option value="">condition</option>
                        <option value="Good">Good</option>
                        <option value="Very Good">Very Good</option>
                        <option value="Not That Good">Not That Good</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><img src="../graphics/filter.svg"></button>
                </div>
           
            
        </form>
    
</div>
<div class="product-list-products-column">
<div class="product-list-products-content">
    
        <?php
        if(!$_GET){
            {
                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                if($num > 0) while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
    
                        echo '<div class="product-list-products-item"><div class="product-list-products-item-details">'
                            . '<div class="product-list-products-item-image">
                            <a href="../view/view.php?id='.$row['idProduct'].'"><img src="../pictures/product-list-product-placeholder.png">
                            <span class="product-list-products-item-image-overlay"></span></a>
                            </div>'
                            . '<div><p>' . $row['title'] . '</p></div>'
                            . '<div><p>' . $row['price'] . ' kr.</p></div>'
                            . '</div></div>'; 
                        }
            }
        }
        else{
            $size = $_GET['size'];
            $brand = $_GET['brand'];
            $condition = $_GET['condition'];
            
            if(isset($_GET['size']) && isset($_GET['brand']) && isset($_GET['condition'])) { $sql = "SELECT * FROM products
            WHERE size ='$size' AND condition = $condition AND brand ='$brand'"; }
            if(isset($_GET['size']) && isset($_GET['brand']) && $_GET['condition']==NULL){
                $sql = "SELECT * FROM products
            WHERE size ='$size' AND brand ='$brand'";
            
            }
            if(isset($_GET['brand']) && isset($_GET['condition']) && $_GET['size']==NULL){
                $sql = "SELECT * FROM products
            WHERE condition = '$condition' AND brand ='$brand'";
            }
            if(isset($_GET['size']) && isset($_GET['condition']) && $_GET['brand']==NULL){
                $sql = "SELECT * FROM products
            WHERE size ='$size' AND condition = '$condition'";
            }
            if(isset($_GET['brand']) && $_GET['condition']==NULL && $_GET['size']==NULL){
                $sql = "SELECT * FROM products
            WHERE brand ='$brand'";
            }
            if($_GET['brand']==NULL && isset($_GET['condition']) && $_GET['size']==NULL){
                $sql = "SELECT * FROM products
            WHERE condition = '$condition'";
            }
            if($_GET['brand']==NULL && $_GET['condition']==NULL && isset($_GET['size'])){
                $sql = "SELECT * FROM products
            WHERE size ='$size'";
            }
            if($_GET['brand']==NULL && $_GET['condition']==NULL && $_GET['size']==NULL){
                $sql = "SELECT * FROM products";
            }
        
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if($num > 0) while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 

                    echo '<div class="product-list-products-item"><div class="product-list-products-item-details">'
                        . '<div class="product-list-products-item-image">
                            <a href="../view/view.php?id='.$row['idProduct'].'"><img src="../pictures/product-list-product-placeholder.png">
                            <span class="product-list-products-item-image-overlay"></span></a>
                        </div>'
                        . '<div><p>' . $row['title'] . '</p></div>'
                        . '<div><p>' . $row['price'] . ' kr.</p></div>'
                        . '</div></div>';
          }
        
    
         }?>
      

</div>
</div>
    
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>  
