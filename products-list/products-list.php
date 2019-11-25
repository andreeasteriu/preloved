<?php
require_once(__DIR__ . '/../navigation/header.php');
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
        <div class="product-list-products-header"></div>
        <div class="product-list-products-filter">
            <input name="size">
            <input name="color">
            <input name="brand">
            <input name="material">
        </div>
        <div class="product-list-products-column">
            <div class="product-list-products-content">
                <?php
                // For each Loop calling the materials
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once(__DIR__ . '/../footer/footer.php');
