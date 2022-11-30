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
								$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_title LIKE '%$keyword%'";

								$run_query = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_array($run_query)) {
									$pro_id    = $row['product_id'];
									$pro_cat   = $row['product_cat'];
									$pro_brand = $row['product_brand'];
									$pro_title = $row['product_title'];
									$pro_price = $row['product_price'];
									$pro_image = $row['product_image'];
									$cat_name = $row["cat_title"];
									echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image'  style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>
			";
								}

								$con->close();
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