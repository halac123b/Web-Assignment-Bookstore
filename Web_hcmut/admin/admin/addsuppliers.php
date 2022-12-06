 <?php
    session_start();
    include("../../db.php");
    include "sidenav.php";
    include "topheader.php";
    if (isset($_POST['btn_save'])) {
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $user_password = htmlspecialchars($_POST['password']);
        $mobile = htmlspecialchars($_POST['phone']);
        $address1 = htmlspecialchars($_POST['city']);
        $address2 = htmlspecialchars($_POST['country']);

        $hashed_password = md5($user_password);

        mysqli_query($con, "INSERT INTO user_info(first_name, last_name,email,password,mobile,address1,address2) VALUES ('$first_name','$last_name','$email','$hashed_password','$mobile','$address1','$address2')")
            or die("Query 1 is incorrect........");
        mysqli_close($con);
    }


    ?>
 <!-- End Navbar -->
 <div class="content">
     <div class="container-fluid">
         <!-- your content here -->
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header card-header-primary">
                     <h4 class="card-title">Add User</h4>
                     <p class="card-category">profile</p>
                 </div>
                 <div class="card-body">
                     <form action="" method="post" name="form" enctype="multipart/form-data">
                         <div class="row">

                             <div class="col-md-3">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">First Name</label>
                                     <input type="text" id="first_name" name="first_name" class="form-control"
                                         required>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Last Name</label>
                                     <input type="text" name="last_name" id="last_name" class="form-control"
                                         required>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Email</label>
                                     <input type="email" name="email" id="email" class="form-control"
                                         required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Password</label>
                                     <input type="password" id="password" name="password" class="form-control"
                                         required>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">phone number</label>
                                     <input type="text" id="phone" name="phone" class="form-control" required>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">City</label>
                                     <input type="text" name="city" id="city" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group bmd-form-group">
                                     <label class="bmd-label-floating">Address</label>
                                     <input type="text" name="country" id="country" class="form-control"
                                         required>
                                 </div>
                             </div>

                         </div>

                         <button type="submit" name="btn_save" id="btn_save"
                             class="btn btn-primary pull-right">Add</button>

                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>