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
                <span class="sr-only">Trước</span>
            </a>
            <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Sau</span>
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
                        <h3 class="title">Mới nhất</h3>
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

                                    function displayStar($avg)
                                    {
                                        for ($i = $avg; $i > $avg - 5; $i--) {
                                            if ($i >= 1) {
                                                echo '<i class="fa fa-star"></i>';
                                            } elseif ($i >= 0.5) {
                                                echo '<i class="fa fa-star-half-o"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        }
                                    }
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
                                            $pro_rating = $row['product_rating'];
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

                                            displayStar($pro_rating);

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
												><i class='fa fa-shopping-cart'></i> Thêm vào giỏ hàng</button>
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

                        <a class="primary-btn cta-btn" href="store.php?cat=1">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <div class="section">
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12 col-xs-12">
                    <div class="section-title">
                        <h4 class="title">Lựa chọn tốt nhất</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>
                    <div class="books">
                        <?php
                        include 'db.php';
                        $sql = "SELECT * FROM products ORDER BY product_rating DESC LIMIT 0,12";
                        $run_query = mysqli_query($con, $sql);
                        echo mysqli_error($con);
                        if ($run_query) {
                            foreach ($run_query as $row) {
                                $img = $row['product_image'];
                                $title = $row['product_title'];
                                $price = $row['product_price'];
                                $des = $row['product_desc'];

                                echo "
                                 <div class='book'>
                                    <img src='product_images/$img' height='120' alt='$title'>
                                    <h4>$title</h4>
                                    <span>$des</span>
                                    <div class='price'>
                                        GIÁ: $price &#x20AB;
                                    </div>
                                </div>
                                ";
                            }
                        }
                        mysqli_close($con);
                        ?>

                    </div>

                </div>

            </div>


        </div>
    </div>


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
														<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> Thêm vào giỏ hàng</button>
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