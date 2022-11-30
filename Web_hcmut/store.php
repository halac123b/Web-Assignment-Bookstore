<?php
require 'db.php';
include 'header.php';
?>

<div class="main main-raised">

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">

                    <!-- aside Widget -->
                    <div id="get_brand">
                    </div>

                    <h3 for="sort">Short by</h3>
                    <select id="sort-select" value="1">
                        <option value="1">Newest</option>
                        <option value="2">Price acs</option>
                        <option value="3">Price desc</option>
                    </select>
                    <!-- /aside Widget -->

                    <div id="clear-filter">Delete All Filters</div>
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store products -->
                    <div class="row" id="product-row">
                        <div class="col-md-12 col-xs-12" id="product_msg">
                        </div>
                        <!-- product -->
                        <div id="get_product">
                            <!--Here we get product jquery Ajax Request-->
                            <?php
                            if (isset($_GET["keyword"])) {
                                $keyword = $_GET["keyword"];
                                $sql = "SELECT * FROM products,categories 
                                WHERE product_cat=cat_id AND product_title LIKE '%$keyword%' 
                                LIMIT 0,9";

                                $run_query = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($run_query)) {
                                    $pro_id    = $row['product_id'];
                                    $pro_cat   = $row['product_cat'];
                                    $pro_brand = $row['product_brand'];
                                    $pro_title = $row['product_title'];
                                    $pro_price = $row['product_price'];
                                    $pro_image = $row['product_image'];
                                    $cat_name = $row["cat_title"];
                                    $rating = 2;

                                    echo "
                                        <div class='col-md-4 col-xs-6'>
                                                <a href='product.php?p=$pro_id'><div class='product'>
                                                    <div class='product-img'>
                                                        <img  src='product_images/$pro_image' style='max-height: 170px;' alt=''>
                                                    </div></a>
                                                    <div class='product-body'>
                                                        <p class='product-category'>$cat_name</p>
                                                        <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
                                                        <h4 class='product-price header-cart-item-info'>$pro_price&#x20AB;</h4>
                                                        <div class='product-rating'>
                                                        ";

                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo "<i class='fa fa-star active'></i>";
                                        } else {
                                            echo "<i class='fa fa-star'></i>";
                                        }
                                    }

                                    echo "
                                                        </div>
                                                    </div>
                                                    <div class='add-to-cart'>
                                                        <button 
                                                            id='product' 
                                                            class='add-to-cart-btn'
                                                            data-id='$pro_id' 
                                                            data-title='$pro_title' 
                                                            data-price='$pro_price' 
                                                            data-image='$pro_image' 
                                                            ><i class='fa fa-shopping-cart'></i> add to cart
                                                        </button>
                                                    </div>
                                                </div>
                                        </div>
                                        ";
                                }

                                mysqli_close($con);
                            }

                            ?>

                        </div>

                        <!-- /product -->
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <ul class="store-pagination" id="pageno">

                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</div>

<?php
include "footer.php";
?>