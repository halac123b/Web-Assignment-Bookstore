<?php
include "header.php";
?>


<section class="section">
    <div class="container-fluid">
        <div id="cart_checkout">
            <div class="main ">
                <div class="table-responsive">
                    <form method="post" action="login_form.php">

                        <table id="cart" class="table table-hover table-condensed" id="">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:7%" class="text-center">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                                <tr>
                                    <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                    <td colspan="2" class="hidden-xs"></td>
                                    <td class="hidden-xs text-center"><b class="net_total"></b></td>
                                    <div id="issessionset"></div>
                                    <td>
                                        <a href="checkout.php" class="btn btn-success" id="ready-checkout-btn">Ready to Checkout</a>
                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>