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
                    <h3><a href="?gender=1&category=&size=&brand=&condition=">Women</a></h3>
                    <div class="product-list-item">
                        <li><a href="?gender=1&category=1&size=&brand=&condition=">Coats</a></li>
                        <li><a href="?gender=1&category=2&size=&brand=&condition=">Jackets</a></li>
                        <li><a href="?gender=1&category=3&size=&brand=&condition=">Blazers</a></li>
                        <li><a href="?gender=1&category=4&size=&brand=&condition=">Dresses</a></li>
                        <li><a href="?gender=1&category=6&size=&brand=&condition=">Shirts | Tops</a></li>
                        <li><a href="?gender=1&category=8&size=&brand=&condition=">Trousers</a></li>
                        <li><a href="?gender=1&category=9&size=&brand=&condition=">Jeans</a></li>
                        <li><a href="?gender=1&category=10&size=&brand=&condition=">T-Shirts</a></li>
                        <li><a href="?gender=1&category=11&size=&brand=&condition=">Skirts | Shorts</a></li>
                        <li><a href="?gender=1&category=14&size=&brand=&condition=">Shoes</a></li>
                        <li><a href="?gender=1&category=15&size=&brand=&condition=">Bags</a></li>
                    </div>
                </ul>

                <ul>
                    <h3><a href="?gender=0&category=&size=&brand=&condition=">Men</a></h3>
                    <div class="product-list-item">
                        <li><a href="?gender=0&category=1&size=&brand=&condition=">Coats</a></li>
                        <li><a href="?gender=0&category=2&size=&brand=&condition=">Jackets</a></li>
                        <li><a href="?gender=0&category=3&size=&brand=&condition=">Blazers</a></li>
                        <li><a href="?gender=0&category=6&size=&brand=&condition=">Shirts</a></li>
                        <li><a href="?gender=0&category=7&size=&brand=&condition=">Knitwear</a></li>
                        <li><a href="?gender=0&category=8&size=&brand=&condition=">Trousers</a></li>
                        <li><a href="?gender=0&category=11&size=&brand=&condition=">Shorts</a></li>
                        <li><a href="?gender=0&category=9&size=&brand=&condition=">Jeans</a></li>
                        <li><a href="?gender=0&category=13&size=&brand=&condition=">Tracksuits</a></li>
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
                <input type="hidden" name="gender">
                <input type="hidden" name="category">
                <div class="product-list-products-filter-input">
                    <select class="" name="size">
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
            $category = $_GET['category'];
            $gender = $_GET['gender'];
            
            /**conditions for filtering */

            if(isset($_GET['gender']) && $_GET['brand']==NULL && $_GET['condition']==NULL && $_GET['size']==NULL && $_GET['category']==NULL){
            $sql = "SELECT * FROM products WHERE gender = $gender";
            }

            if(isset($_GET['gender']) && $_GET['brand']==NULL && $_GET['condition']==NULL && $_GET['size']==NULL && isset($_GET['category'])){
                $sql = "SELECT * FROM products WHERE idCategory = $category";
            }
            
            if(isset($_GET['size']) && isset($_GET['brand']) && isset($_GET['condition']) && $_GET['gender']==NULL && $_GET['category']==NULL) 
            { $sql = "SELECT * FROM products
            WHERE size ='$size' AND condition = $condition AND brand ='$brand'"; }
            
            if(isset($_GET['size']) && isset($_GET['brand']) && $_GET['condition']==NULL && $_GET['gender']==NULL && $_GET['category']==NULL){
                $sql = "SELECT * FROM products
            WHERE size ='$size' AND brand ='$brand'";
            
            }
            if(isset($_GET['brand']) && isset($_GET['condition']) && $_GET['size']==NULL && $_GET['gender']==NULL && $_GET['category']==NULL){
                $sql = "SELECT * FROM products
            WHERE condition = '$condition' AND brand ='$brand'";
            }
            if(isset($_GET['size']) && isset($_GET['condition']) && $_GET['brand']==NULL && $_GET['gender']==NULL && $_GET['category']==NULL){
                $sql = "SELECT * FROM products
            WHERE size ='$size' AND condition = '$condition'";
            }
            if(isset($_GET['brand']) && $_GET['condition']==NULL && $_GET['size']==NULL && $_GET['gender']==NULL && $_GET['category']==NULL){
                $sql = "SELECT * FROM products
            WHERE brand ='$brand'";
            }
            if($_GET['brand']==NULL && isset($_GET['condition']) && $_GET['size']==NULL && $_GET['gender']==NULL && $_GET['category']==NULL){
                $sql = "SELECT * FROM products
            WHERE condition = '$condition'";
            }
            if($_GET['brand']==NULL && $_GET['condition']==NULL && isset($_GET['size']) && $_GET['gender']==NULL && $_GET['category']==NULL){
                $sql = "SELECT * FROM products
            WHERE size ='$size'";
            }
            if($_GET['brand']==NULL && $_GET['condition']==NULL && $_GET['size']==NULL && $_GET['gender']==NULL && $_GET['category']==NULL){
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