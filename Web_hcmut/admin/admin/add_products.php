<?php
session_start();
include("../../db.php");


if (isset($_POST['btn_save'])) {
    $product_name = htmlspecialchars($_POST['product_name']);
    $details = htmlspecialchars($_POST['details']);
    $price = htmlspecialchars($_POST['price']);
    $c_price = htmlspecialchars($_POST['c_price']);
    $product_type = htmlspecialchars($_POST['product_type']);
    $brand = htmlspecialchars($_POST['brand']);
    $tags = htmlspecialchars($_POST['tags']);

    //picture coding
    $picture_name = $_FILES['picture']['name'];
    $picture_type = $_FILES['picture']['type'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $picture_size = $_FILES['picture']['size'];

    if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
        if ($picture_size <= 50000000)

            $pic_name = time() . "_" . $picture_name;
        move_uploaded_file($picture_tmp_name, "../../product_images/" . $pic_name);

        mysqli_query($con, "insert into products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$tags')") or die("query incorrect");
        header("location: sumit_form.php?success=1");
    }
    mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
            <div class="row">


                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Add Product</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" id="product_name" required name="product_name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="">Add Image</label>
                                        <input type="file" name="picture" required
                                            class="btn btn-fill btn-success" id="picture">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="4" cols="80" id="details" required name="details"
                                            class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pricing</label>
                                        <input type="text" id="price" name="price" required
                                            class="form-control">
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Categories</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Category</label>
                                        <select name="product_type" id="product_type" class="form-control">
                                            <?php
                                            $categoryList = mysqli_query($con, "SELECT * FROM categories");
                                            foreach ($categoryList as $cat) {
                                                $id = $cat['cat_id'];
                                                $title = $cat['cat_title'];
                                                echo "<option value='$id'>$title</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Product Brand</label>
                                        <select name="brand" id="brand" class="form-control">
                                            <?php
                                            $brandList = mysqli_query($con, "SELECT * FROM brands");
                                            foreach ($brandList as $brand) {
                                                $id = $brand['brand_id'];
                                                $title = $brand['brand_title'];
                                                echo "<option value='$id'>$title</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Keywords</label>
                                        <input type="text" id="tags" name="tags" required
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" id="btn_save" name="btn_save" required
                                class="btn btn-fill btn-primary">Add Product</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>
<?php
mysqli_close($con);
?>