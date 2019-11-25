<?php
require_once(__DIR__ . '/../../navigation/header.php');
?>
<!-- navigation goes here -->
<div class="product-list-main">
    <div class="product-list-sidebar">
        <div class="product-list-sidebar-content"></div>
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
