<?php
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