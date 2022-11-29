<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if (isset($_POST["categoryhome"])) {
	$category_query = "SELECT * FROM categories";

	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
	echo "
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
                    <li id='home'><a href='index.php'>Home</a></li>
	";
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];

			$sql = "SELECT COUNT(*) AS count_items FROM products,categories WHERE product_cat=cat_id";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$count = $row["count_items"];

			echo "
               <li class='categoryhome' id='cat-$cid'><a href='store.php?cat=$cid'>$cat_name</a></li>
			";
		}

		echo "</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
               
			";
	}
}


if (isset($_POST["page"])) {
	$cat_id = $_POST['catId'];
	$sql = "SELECT * FROM products WHERE product_cat=$cat_id";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 9);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li data-page='$i' id='page'>$i</li>
		";
	}
}

if (isset($_POST["brand"])) {
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brand_query);
	echo "
		<div class='aside'>
			<h3 class='aside-title'>Publisher</h3>
			<div class='btn-group-vertical'>
	";
	if (mysqli_num_rows($run_query) > 0) {
		$i = 1;
		while ($row = mysqli_fetch_array($run_query)) {

			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			$i++;
			echo "
                    <div class='btn navbar-btn selectBrand' bid='$bid'>
							$brand_name
					</div>
			";
		}
		echo "</div>";
	}
}


// if (isset($_POST["getProducthome"])) {
// 	$limit = 3;
// 	if (isset($_POST["setPage"])) {
// 		$pageno = $_POST["pageNumber"];
// 		$start = ($pageno * $limit) - $limit;
// 	} else {
// 		$start = 0;
// 	}
// 	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_";
// 	$run_query = mysqli_query($con, $product_query);
// 	if (mysqli_num_rows($run_query) > 0) {
// 		while ($row = mysqli_fetch_array($run_query)) {
// 			$pro_id    = $row['product_id'];
// 			$pro_cat   = $row['product_cat'];
// 			$pro_brand = $row['product_brand'];
// 			$pro_title = $row['product_title'];
// 			$pro_price = $row['product_price'];
// 			$pro_image = $row['product_image'];

// 			$cat_name = $row["cat_title"];
// 			echo "

//                        <div class='product-widget'>
//                                 <a href='product.php?p=$pro_id'> 
// 									<div class='product-img'>
// 										<img src='product_images/$pro_image' alt=''>
// 									</div>
// 									<div class='product-body'>
// 										<p class='product-category'>$cat_name</p>
// 										<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
// 										<h4 class='product-price'>$pro_price<del class='product-old-price'>$990.00</del></h4>
// 									</div></a>
// 								</div>

// 			";
// 		}
// 	}
// }


// if (isset($_POST["gethomeProduct"])) {
// 	$limit = 9;
// 	if (isset($_POST["setPage"])) {
// 		$pageno = $_POST["pageNumber"];
// 		$start = ($pageno * $limit) - $limit;
// 	} else {
// 		$start = 0;
// 	}

// 	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 71 AND 74";
// 	$run_query = mysqli_query($con, $product_query);
// 	if (mysqli_num_rows($run_query) > 0) {

// 		while ($row = mysqli_fetch_array($run_query)) {
// 			$pro_id    = $row['product_id'];
// 			$pro_cat   = $row['product_cat'];
// 			$pro_brand = $row['product_brand'];
// 			$pro_title = $row['product_title'];
// 			$pro_price = $row['product_price'];
// 			$pro_image = $row['product_image'];

// 			$cat_name = $row["cat_title"];

// 			echo "


//                                 <div class='col-md-3 col-xs-6'>
// 								<a href='product.php?p=$pro_id'><div class='product'>
// 									<div class='product-img'>
// 										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
// 										<div class='product-label'>
// 											<span class='sale'>-30%</span>
// 											<span class='new'>NEW</span>
// 										</div>
// 									</div></a>
// 									<div class='product-body'>
// 										<p class='product-category'>$cat_name</p>
// 										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
// 										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
// 										<div class='product-rating'>
// 											<i class='fa fa-star'></i>
// 											<i class='fa fa-star'></i>
// 											<i class='fa fa-star'></i>
// 											<i class='fa fa-star'></i>
// 											<i class='fa fa-star'></i>
// 										</div>
// 										<div class='product-btns'>
// 											<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
// 											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
// 											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
// 										</div>
// 									</div>
// 									<div class='add-to-cart'>
// 										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
// 									</div>
// 								</div>
//                                 </div>


// 			";
// 		};
// 	}
// }

if (isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"]) || isset($_POST['get_seleted_brand'])) {
	if (isset($_POST['pageNo'])) {
		$limit = 9;
		$start = ($_POST['pageNo'] * $limit) - $limit;
	} else {
		$start = 0;
		$limit = 10000;
	}

	if (isset($_POST["get_seleted_Category"])) {
		$catId = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories 
		WHERE product_cat =$catId AND cat_id=product_cat";
	} else if (isset($_POST['get_seleted_brand'])) {
		$catId = $_POST["cat_id"];
		$brandId = $_POST['brandId'];
		$sql = "SELECT * FROM products,categories 
		WHERE product_brand=$brandId AND product_cat=$catId AND cat_id=product_cat";
	} else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products,categories 
		WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
	}

	if (isset($_POST['sort_opt'])) {
		$sort_opt = $_POST['sort_opt'];
		switch ($sort_opt) {
			case '1':
				$sql .= " ORDER BY product_id DESC";
				break;
			case '2':
				$sql .= " ORDER BY product_price ASC";
				break;
			case '3':
				$sql .= " ORDER BY product_price DESC";
				break;
			default:
				$sql .= " ORDER BY product_id DESC";
				break;
		}
	}

	$sql .= " LIMIT $start,$limit";

	$run_query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($run_query)) {
		$pro_id    = $row['product_id'];
		$pro_cat   = $row['product_cat'];
		$pro_brand = $row['product_brand'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];
		$cat_name = $row["cat_title"];
		$rating = 4;

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
}
