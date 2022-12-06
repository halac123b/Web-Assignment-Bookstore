<?php
session_start();
include("../../db.php");
$user_id = $_REQUEST['user_id'];

$current_user_query = mysqli_query($con, "SELECT * FROM user_info WHERE user_id='$user_id'") or die(mysqli_error($con));
$current_user = mysqli_fetch_assoc($current_user_query);

if (isset($_POST['btn_save'])) {
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $user_password = htmlspecialchars($_POST['password']);
  $hashed_user_password = password_hash($user_password, PASSWORD_DEFAULT);


  if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($user_password)) {
    mysqli_query($con, "UPDATE user_info SET first_name='$first_name', last_name='$last_name', email='$email', PASSWORD='$hashed_user_password' WHERE user_id='$user_id'") or die("Query 2 is incorrect..........");
    header("Location: manageuser.php");
  } else {
    echo "<script>alert('Please fill all the fields')</script>";
  }
  mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h5 class="title">Edit User</h5>
                </div>
                <form action="edit_users.php" name="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <input type="hidden" name="user_id" id="user_id"
                            value="<?= $current_user["user_id"] ?>" />
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control"
                                    value="<?= $current_user["first_name"] ?>">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control"
                                    value="<?= $current_user["last_name"] ?>">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?= $current_user["email"] ?>">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="btn_save" name="btn_save"
                            class="btn btn-fill btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>