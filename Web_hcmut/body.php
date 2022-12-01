<div class="main main-raised">
    <div class="container mainn-raised" style="width:100%;">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->


            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="img/banner3.jpg" alt="Los Angeles" style="width:100%;">

                </div>

                <div class="item">
                    <img src="img/banner2.jpg" style="width:100%;">

                </div>

                <div class="item">
                    <img src="img/banner4.jpg" alt="New York" style="width:100%;">

                </div>
                <div class="item">
                    <img src="img/banner1.jpg" alt="New York" style="width:100%;">

                </div>


            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>



    <!-- SECTION -->
    <div class="section mainn mainn-raised">


        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="product.php?p=78">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="./img/shop01.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Laptop<br>Collection</h3>
                                <a href="product.php?p=78" class="cta-btn">Shop now <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="product.php?p=72">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="./img/shop03.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Accessories<br>Collection</h3>
                                <a href="product.php?p=72" class="cta-btn">Shop now <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="product.php?p=79">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="./img/shop02.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Cameras<br>Collection</h3>
                                <a href="product.php?p=79" class="cta-btn">Shop now <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Newest</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">

                                    <?php
									include 'db.php';


									$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id ORDER BY product_id DESC LIMIT 10";
									$run_query = mysqli_query($con, $product_query);
									if (mysqli_num_rows($run_query) > 0) {

										while ($row = mysqli_fetch_array($run_query)) {
											$pro_id    = $row['product_id'];
											$pro_cat   = $row['product_cat'];
											$pro_brand = $row['product_brand'];
											$pro_title = $row['product_title'];
											$pro_price = $row['product_price'];
											$pro_image = $row['product_image'];
											$cat_name = $row["cat_title"];
											$rating = 4.2;


											echo "
												<div class='product'>
													<a href='product.php?p=$pro_id'><div class='product-img'>
														<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
													</div></a>
													<div class='product-body'>
														<p class='product-category'>$cat_name</p>
														<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
														<h4 class='product-price header-cart-item-info'>$pro_price&#x20AB;</h4>
														<div class='product-rating' data-rating='$rating'>
														";

											for ($i = 1; $i <= 5; $i++) {
												if ($i < $rating) {
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
												class='add-to-cart-btn block2-btn-towishlist'
												id='product' 
												data-id='$pro_id' 
												data-title='$pro_title' 
												data-price='$pro_price' 
												data-image='$pro_image' 
												><i class='fa fa-shopping-cart'></i> add to cart</button>
											</div>
										</div>
									";
										};
									}

									mysqli_close($con);
									?>

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section mainn mainn-raised">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">

                        </ul>

                        <a class="primary-btn cta-btn" href="store.php">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <?php
				include './db.php';
				$querry = "SELECT * from categories WHERE cat_id=1";
				$result = mysqli_query($con, $querry);
				$result = mysqli_fetch_assoc($result);
				echo '
				<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">' . $result['cat_title'] . '</h3>
						</div>
					</div>
				<!-- /section title -->		
					';
				mysqli_close($con);
				?>

                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <?php
									include 'db.php';

									$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND cat_id=1";
									$run_query = mysqli_query($con, $product_query);
									if (mysqli_num_rows($run_query) > 0) {

										while ($row = mysqli_fetch_array($run_query)) {
											$pro_id    = $row['product_id'];
											$pro_cat   = $row['product_cat'];
											$pro_brand = $row['product_brand'];
											$pro_title = $row['product_title'];
											$pro_price = $row['product_price'];
											$pro_image = $row['product_image'];

											$cat_name = $row["cat_title"];
											$rating = 2.5;

											echo "
												<div class='product'>
													<a href='product.php?p=$pro_id'>
														<div class='product-img'>
															<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
														</div>
													</a>
													<div class='product-body'>
														<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
														<h4 class='product-price header-cart-item-info'>$pro_price&#x20AB;</h4>
														<div class='product-rating' data-rating='$rating'>
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
														<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
													</div>
												</div>
												";
										};
									}

									mysqli_close($con);
									?>

                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <?php
					include './db.php';
					$querry = "SELECT * from categories WHERE cat_id=2";
					$result = mysqli_query($con, $querry);
					$result = mysqli_fetch_assoc($result);
					echo '
							<div class="section-title">
								<h4 class="title">' . $result['cat_title'] . '</h4>
								<div class="section-nav">
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
							</div>
						';
					mysqli_close($con);
					?>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div id="get_product_home2">
                            <?php
							include 'db.php';

							$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND cat_id=2 ORDER BY product_id LIMIT 5";
							$run_query = mysqli_query($con, $product_query);
							if (mysqli_num_rows($run_query) > 0) {

								while ($row = mysqli_fetch_array($run_query)) {
									$pro_id    = $row['product_id'];
									$pro_cat   = $row['product_cat'];
									$pro_brand = $row['product_brand'];
									$pro_title = $row['product_title'];
									$pro_price = $row['product_price'];
									$pro_image = $row['product_image'];

									$cat_name = $row["cat_title"];

									echo "
												<!-- product widget -->
												<div class='product-widget'>
													<div class='product-img'>
														<img src='./product_images/$pro_image' alt=''>
													</div>
													<div class='product-body'>
														<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
														<h4 class='product-price'>$pro_price&#x20AB;</h4>
													</div>
												</div>
												<!-- /product widget -->
											";
								}
							}
							mysqli_close($con);

							?>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <?php
					include './db.php';
					$querry = "SELECT * from categories WHERE cat_id=3";
					$result = mysqli_query($con, $querry);
					$result = mysqli_fetch_assoc($result);
					echo '
							<div class="section-title">
								<h4 class="title">' . $result['cat_title'] . '</h4>
								<div class="section-nav">
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
							</div>
						';
					mysqli_close($con);
					?>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            <?php
							include 'db.php';

							$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND cat_id=3 ORDER BY product_id LIMIT 5";
							$run_query = mysqli_query($con, $product_query);
							if (mysqli_num_rows($run_query) > 0) {

								while ($row = mysqli_fetch_array($run_query)) {
									$pro_id    = $row['product_id'];
									$pro_cat   = $row['cat_title'];
									$pro_brand = $row['product_brand'];
									$pro_title = $row['product_title'];
									$pro_price = $row['product_price'];
									$pro_image = $row['product_image'];

									$cat_name = $row["cat_title"];

									echo "
												<!-- product widget -->
												<div class='product-widget'>
													<div class='product-img'>
														<img src='./product_images/$pro_image' alt=''>
													</div>
													<div class='product-body'>
														<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
														<h4 class='product-price'>$pro_price&#x20AB;</h4>
													</div>
												</div>
												<!-- /product widget -->
											";
								}
							}
							mysqli_close($con);

							?>
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs">

                </div>

                <div class="col-md-4 col-xs-6">
                    <?php
					include './db.php';
					$querry = "SELECT * from categories WHERE cat_id=4";
					$result = mysqli_query($con, $querry);
					$result = mysqli_fetch_assoc($result);
					echo '
							<div class="section-title">
								<h4 class="title">' . $result['cat_title'] . '</h4>
								<div class="section-nav">
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
							</div>
						';
					mysqli_close($con);
					?>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                            <?php
							include 'db.php';

							$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND cat_id=4 ORDER BY product_id LIMIT 5";
							$run_query = mysqli_query($con, $product_query);
							if (mysqli_num_rows($run_query) > 0) {

								while ($row = mysqli_fetch_array($run_query)) {
									$pro_id    = $row['product_id'];
									$pro_cat   = $row['product_cat'];
									$pro_brand = $row['product_brand'];
									$pro_title = $row['product_title'];
									$pro_price = $row['product_price'];
									$pro_image = $row['product_image'];

									$cat_name = $row["cat_title"];

									echo "
												<!-- product widget -->
												<div class='product-widget'>
													<div class='product-img'>
														<img src='./product_images/$pro_image' alt=''>
													</div>
													<div class='product-body'>
														<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
														<h4 class='product-price'>$pro_price&#x20AB;</h4>
													</div>
												</div>
												<!-- /product widget -->
											";
								}
							}
							mysqli_close($con);

							?>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">BXH Tháng 11/2022</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Tên người dùng</th>
                                <th>Điểm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="active-row">
                                <td><img src="data:image/png;base64,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"
                                        alt="Avatar" class="avatar"> Dom</td>
                                <td>6000</td>
                            </tr>
                            <tr>
                                <td><img src="data:image/jpeg;base64,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"
                                        alt="Avatar" class="avatar"> Melisa</td>
                                <td>4532</td>
                            </tr>
                            <tr>
                                <td><img src="data:image/png;base64,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"
                                        alt="Avatar" class="avatar"> fb1797358161</td>
                                <td>3333</td>
                            </tr>
                            <tr>
                                <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE50XUNVmCwLBsiboW_ezv-O6FK2KRmh38SQ&usqp=CAU"
                                        alt="Avatar" class="avatar"> fb179</td>
                                <td>2410</td>
                            </tr>
                            <tr>
                                <td><img src="data:image/png;base64,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"
                                        alt="Avatar" class="avatar"> Haha</td>
                                <td>500</td>
                            </tr>

                            <!-- and so on... -->
                        </tbody>
                    </table>

                </div>
                <div class="col-md-8 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Sách nên đọc</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>
                    <div class="books">
                        <div class="book">
                            <img
                                src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/1/37949.jpg?v=1&w=200&h=292">
                            <h1>Metin2 Refine Window</h1>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</span>
                            <div class="price">
                                PRICE: $199
                            </div>
                        </div>
                        <div class="book">
                            <img
                                src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/1/36155.jpg?v=1&w=200&h=292">
                            <h1>Metin2 Refine Window</h1>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</span>
                            <div class="price">
                                PRICE: $199
                            </div>
                        </div>
                        <div class="book">
                            <img
                                src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/1/37454.jpg?v=1&w=200&h=292">
                            <h1>Metin2 Refine Window</h1>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</span>
                            <div class="price">
                                PRICE: $199
                            </div>
                        </div>
                        <div class="book">
                            <img
                                src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/1/37478.jpg?v=1&w=200&h=292">
                            <h1>Metin2 Refine Window</h1>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</span>
                            <div class="price">
                                PRICE: $199
                            </div>
                        </div>
                        <div class="book">
                            <img
                                src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/1/38759.jpg?v=1&w=200&h=292">
                            <h1>Metin2 Refine Window</h1>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</span>
                            <div class="price">
                                PRICE: $199
                            </div>
                        </div>
                        <div class="book">
                            <img
                                src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/1/38708.jpg?v=1&w=200&h=292">
                            <h1>Metin2 Refine Window</h1>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</span>
                            <div class="price">
                                PRICE: $199
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
        <div class="section">


            <!-- container -->
            <div class="container">

                <!-- row -->
                <div class="row">
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="wrapper">
                            <div class="card">
                                <img src="https://ychef.files.bbci.co.uk/976x549/p03gg1lc.jpg">
                                <div class="descriptions">
                                    <h1>Đọc ở mọi lúc mọi nơi</h1>
                                    <p>
                                        BK Bookstore dùng được trên cả máy tính, di động, máy tính bảng. </p>
                                    <button>
                                        <i class="fab fa-youtube"></i>
                                        Play trailer on YouTube
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="wrapper">
                            <div class="card">
                                <img
                                    src="https://assets.architecturaldigest.in/photos/624c2654cf7483eb90e638d6/16:9/w_2560%2Cc_limit/Books-1.jpg">
                                <div class="descriptions">
                                    <h1>Đa dạng thể loại nội dung</h1>
                                    <p>
                                        BK Bookstore có: Sách chữ, sách nói, truyện tranh và tạp chí. </p>
                                    <button>
                                        <i class="fab fa-youtube"></i>
                                        Play trailer on YouTube
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="wrapper">
                            <div class="card">
                                <img
                                    src="https://www.west-dunbarton.gov.uk/media/4320559/pickawood-gf8e6xvg_3e-unsplash.jpg">
                                <div class="descriptions">
                                    <h1>Đọc sách VIP siêu rẻ</h1>
                                    <p>
                                        Chỉ 1,000 vnđ/ngày là bạn có thể đọc Trọn bộ sách yêu thích trên BK Bookstore
                                    </p>
                                    <button>
                                        <i class="fab fa-youtube"></i>
                                        Play trailer on YouTube
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <br>
                        <br>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
        </div>
    </div>