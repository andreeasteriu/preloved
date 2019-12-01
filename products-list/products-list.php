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
        <div class="product-list-products-filter">
            <form class="product-list-products-filter-input"><input placeholder="size" name="size"><button>Filter</button></form>
            <form class="product-list-products-filter-input"><input placeholder="color" name="color"><button>Filter</button></form>
            <form class="product-list-products-filter-input"><input placeholder="brand" name="brand"><button>Filter</button></form>
            <form class="product-list-products-filter-input"><input placeholder="material" name="material"><button>Filter</button></form>
        </div>
        <div class="product-list-products-column">
            <div class="product-list-products-content">
                
                    <?php
                    $sql = 'SELECT * FROM products;';
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo '<div class="product-list-products-item"><div class="product-list-products-item-details">'
                            .'<div class="product-list-products-item-image">
                                <img src="../pictures/product-list-product-placeholder.png">
                                <div class="product-list-products-item-image-overlay"></div>
                            </div>'
                            .'<div><p>'.$row['title'].'</p></div>'
                            .'<div><p>'.$row['price'].' kr.</p></div>'
                            .'</div></div>';
                        }
                    }
                    ?>
                
            </div>
        </div>
    </div>
</div>
<?php
include_once(__DIR__ . '/../footer/footer.php');
