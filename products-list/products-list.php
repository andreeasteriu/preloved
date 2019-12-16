<?php
$sPageName = "Products List";
session_start();
require_once(__DIR__ . '/../includes/db-connect.php');

if (isset($_SESSION['username'])) {
    require_once(__DIR__ . '/../navigation/header-logout.php');
}

if (empty($_SESSION)) {
    require_once(__DIR__ . '/../navigation/header.php');
}

?>

<!-- navigation goes here -->
<div class="product-list-main">
    <div class="product-list-sidebar">
        <div class="product-list-sidebar-content">
            <div class="product-list-navigation">
                <ul>
                    <h3><a href="?">Women</a></h3>
                    <div class="product-list-item">
                        <li><a href="?gender=1&category=1&size=&brand=">Coats</a></li>
                        <li><a href="?gender=1&category=2&size=&brand=">Jackets</a></li>
                        <li><a href="?gender=1&category=3&size=&brand=">Blazers</a></li>
                        <li><a href="?gender=1&category=4&size=&brand=">Dresses</a></li>
                        <li><a href="?gender=1&category=6&size=&brand=">Shirts | Tops</a></li>
                        <li><a href="?gender=1&category=8&size=&brand=">Trousers</a></li>
                        <li><a href="?gender=1&category=9&size=&brand=">Jeans</a></li>
                        <li><a href="?gender=1&category=10&size=&brand=">T-Shirts</a></li>
                        <li><a href="?gender=1&category=11&size=&brand=">Skirts | Shorts</a></li>
                        <li><a href="?gender=1&category=14&size=&brand=">Shoes</a></li>
                        <li><a href="?gender=1&category=15&size=&brand=">Bags</a></li>
                    </div>
                </ul>

                <ul>
                    <h3><a href="?">Men</a></h3>
                    <div class="product-list-item">
                        <li><a href="?gender=0&category=1&size=&brand=">Coats</a></li>
                        <li><a href="?gender=0&category=2&size=&brand=">Jackets</a></li>
                        <li><a href="?gender=0&category=3&size=&brand=">Blazers</a></li>
                        <li><a href="?gender=0&category=6&size=&brand=">Shirts</a></li>
                        <li><a href="?gender=0&category=7&size=&brand=">Knitwear</a></li>
                        <li><a href="?gender=0&category=8&size=&brand=">Trousers</a></li>
                        <li><a href="?gender=0&category=11&size=&brand=">Shorts</a></li>
                        <li><a href="?gender=0&category=9&size=&brand=">Jeans</a></li>
                        <li><a href="?gender=0&category=13&size=&brand=">Tracksuits</a></li>
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


            </form>

        </div>
        <div class="product-list-products-column">
            <div class="product-list-products-content">

                <?php
                if (!$_GET) { {
                        $stmt = $dbh->prepare("SELECT * FROM products");
                        if ($stmt->execute(array())) {
                            while ($row = $stmt->fetch()) {

                                echo '<div class="product-list-products-item"><div class="product-list-products-item-details">'
                                    . '<div class="product-list-products-item-image">
                            <a href="../view/view.php?id=' . $row['idProduct'] . '"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '">
                            <span class="product-list-products-item-image-overlay"></span></a>
                            </div>'
                                    . '<div><p>' . $row['title'] . '</p></div>'
                                    . '<div><p>' . $row['price'] . ' kr.</p></div>'
                                    . '</div></div>';
                            }
                        }
                    }
                } else {
                    $size = $_GET['size'];
                    $brand = $_GET['brand'];
                    $category = $_GET['category'];
                    $gender = $_GET['gender'];

                    /**conditions for filtering */
                    function arrayResults($row)
                    {
                        echo '<div class="product-list-products-item"><div class="product-list-products-item-details">'
                            . '<div class="product-list-products-item-image">
                                <a href="../view/view.php?id=' . $row['idProduct'] . '"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '">
                                <span class="product-list-products-item-image-overlay"></span></a>
                            </div>'
                            . '<div><p>' . $row['title'] . '</p></div>'
                            . '<div><p>' . $row['price'] . ' kr.</p></div>'
                            . '</div></div>';
                    }


                    if (isset($_GET['gender']) && $_GET['brand'] == NULL &&  $_GET['size'] == NULL && $_GET['category'] == NULL) {
                        $sql = "SELECT * FROM products WHERE gender = $gender";
                    }

                    if (isset($_GET['gender']) && $_GET['brand'] == NULL &&  $_GET['size'] == NULL && isset($_GET['category'])) {
                        $stmt = $dbh->prepare("SELECT * FROM products WHERE idCategory = ?");
                        if ($stmt->execute(array($category))) {
                            while ($row = $stmt->fetch()) {
                                arrayResults($row);
                            }
                        }
                    }

                    if (isset($_GET['size']) && isset($_GET['brand']) &&  $_GET['gender'] == NULL && $_GET['category'] == NULL) {
                        $sql = "SELECT * FROM products
            WHERE size ='$size' AND brand ='$brand'";

                        $stmt = $dbh->prepare("SELECT * FROM products INNER JOIN brands ON products.idBrand = brands.idBrand WHERE size = ? AND brands.brandName = ?");
                        if ($stmt->execute(array($size, $brand))) {
                            while ($row = $stmt->fetch()) {
                                arrayResults($row);
                            }
                        }
                    }

                    if (isset($_GET['brand']) &&  $_GET['size'] == NULL && $_GET['gender'] == NULL && $_GET['category'] == NULL) {

                        $stmt = $dbh->prepare("SELECT * FROM products INNER JOIN brands ON products.idBrand = brands.idBrand  WHERE brands.brandName = ?");
                        if ($stmt->execute(array($brand))) {
                            while ($row = $stmt->fetch()) {
                                arrayResults($row);
                            }
                        }
                    }

                    if ($_GET['brand'] == NULL &&  isset($_GET['size']) && $_GET['gender'] == NULL && $_GET['category'] == NULL) {
                        $stmt = $dbh->prepare("SELECT * FROM products WHERE size = ?");
                        if ($stmt->execute(array($size))) {
                            while ($row = $stmt->fetch()) {
                                arrayResults($row);
                            }
                        }
                    }
                }
                ?>


            </div>
        </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php require_once(__DIR__ . '/../footer/footer.php'); ?>