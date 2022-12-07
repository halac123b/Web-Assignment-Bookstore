<?php
session_start();
include("./includes/db.php");

error_reporting(0);
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $order_id = $_GET['order_id'];

  /*this is delet query*/
  mysqli_query($con, "delete from orders where order_id='$order_id'") or die("delete query is incorrect...");
}

///pagination
$page = $_GET['page'];

if ($page == "" || $page == "1") {
  $page1 = 0;
} else {
  $page1 = ($page * 10) - 10;
}

include "sidenav.php";
include "topheader.php";

?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Orders / Page <?php echo $page; ?> </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Contact | Email</th>
                                    <th>Address</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $result = mysqli_query($con, "SELECT o.order_id,qty,f_name,product_title,email,address,total_amt,p_status FROM orders AS o INNER JOIN orders_info AS oi ON o.order_id=oi.order_id INNER JOIN products AS p ON p.product_id = o.product_id LIMIT $page1,10") or die("query 1 incorrect.....");

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                  <td>$row[f_name]</td>
                  <td>$row[product_title]</td>
                  <td>$row[qty]</td>
                  <td>$row[email]</td>
                  <td>$row[address]</td>
                  <td>$row[total_amt]</td>";
                  if ($row["p_status"] == 'Delivering') {
                    echo "<td class='text-secondary'>$row[p_status]</td>";
                  } else if ($row["p_status"] == 'Cancelled') {
                    echo "<td class='text-danger'>$row[p_status]</td>";
                  } else {
                    echo "<td class='text-success'>$row[p_status]</td>";
                  }

                  if ($row["p_status"] == 'Delivering') {
                    echo "
                  <td>
                        <a class='btn btn-sm btn-danger' href='edit_orders.php?order_id=$row[order_id]&action=cancel'>Cancel</a>
                        <a class='btn btn-sm btn-success' href='edit_orders.php?order_id=$row[order_id]&action=complete'>Complete</a>
                  </td>
                      ";
                  }
                  echo "</tr>";
                }
                ?>
                            </tbody>
                        </table>

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#orders').addClass('active');
});
</script>