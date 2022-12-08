<?php
session_start();
$uid = $_SESSION['uid'];
if (!isset($uid)) {
    echo "
    <script>window.location.href = 'index.php'</script>
  ";
    exit();
}
include "header.php";
include 'db.php';

if (isset($_POST['first-name'])) {
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $city = $_POST['city'];
}

if (isset($fname) && isset($lname) && isset($phone) && isset($email) && isset($addr) && isset($city)) {
    $sql = "UPDATE user_info 
    SET first_name='$fname', last_name='$lname', 
    email='$email', mobile='$phone', address1='$addr', address2='$city' 
    WHERE user_id=$uid";
    mysqli_query($con, $sql);
    echo "<script>window.location.href = 'profile.php'</script>";
}

$sql = "SELECT * FROM user_info WHERE user_id=$uid";
$run_query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($run_query);
$first_name = $result['first_name'];
$last_name = $result['last_name'];
$email = $result['email'];
$phone = $result['mobile'];
$address1 = $result['address1'];
$address2 = $result['address2'];

echo "
    <section class='section'>
        <div class='container-fluid'>
            <form action='' method='POST'>
                <div class='row'>
                    <div class='form-group col-lg-4 col-md-6 col-sm-12'>
                        <label for='first-name'>Họ</label>
                        <input type='text' id='first-name' name='first-name' class='form-control' required
                        value='$first_name'>
                    </div>
                    <div class='form-group col-lg-4 col-md-6 col-sm-12'>
                        <label for='last-name'>Tên</label>
                        <input type='text' id='last-name' name='last-name' class='form-control' required
                        value='$last_name'>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col-lg-4 col-md-6 col-sm-12'>
                        <label for='phone'>Số điện thoại</label>
                        <input type='text' id='phone' name='phone' class='form-control' required
                        value='$phone'>
                    </div>
                    <div class='form-group col-lg-4 col-md-6 col-sm-12'>
                        <label for='email'>Email</label>
                        <input type='email' id='email' name='email' class='form-control' required
                        value='$email'>
                    </div>
                </div>
                <div class='row'>
                    <div class='form-group col-lg-4 col-md-6 col-sm-12'>
                        <label for='addr'>Địa chỉ</label>
                        <input type='text' id='addr' name='addr' class='form-control' required
                        value='$address1'>
                    </div>
                    <div class='form-group col-lg-4 col-md-6 col-sm-12'>
                        <label for='city'>Thành phố</label>
                        <input type='text' id='city' name='city' class='form-control' required
                        value='$address2'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-3 col-md-4 col-sm-12'>
                        <input type='submit' class='btn btn-success' value='Cập nhật'>
                    </div>
                </div>

            </form>
        </div>
    </section>
";
?>


<?php
include 'footer.php';
?>