<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Về chúng tôi</h3>
                        <p> Công Ty Cổ Phần Phát Hành Sách TP HCM - BK BOOKSTORE -
                            15-17 Tôn Đức Thắng, Quận 1, TP. HCM, Việt Nam, nhận đặt hàng trực tuyến và giao hàng tận
                            nơi.
                            <br>
                            KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống trên toàn
                            quốc.
                        </p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>15-17 Tôn Đức Thắng, Q.1, TP. HCM</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+84-0123456789</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>bk@hcmut.edu.vn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="margin-top:80px;">
                    <ul class="footer-payments">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4815584805283!2d106.70413911477142!3d10.774381392322878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4427cc6a63%3A0xb685b00c0b210443!2zMTUgxJAuIFTDtG4gxJDhu6ljIFRo4bqvbmcsIELhur9uIE5naMOpLCBRdeG6rW4gMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1670330626941!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </ul>

                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;2022 All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Thể loại</h3>
                        <ul class="footer-links">
                            <?php
                            include 'db.php';
                            $result = mysqli_query($con, 'SELECT * FROM categories');
                            foreach ($result as $cat) {
                                $cat_id = $cat['cat_id'];
                                $cat_title = $cat['cat_title'];
                                echo "<li><a href='store?cat=$cat_id'>$cat_title</a></li>";
                            }
                            ?>

                        </ul>

                    </div>
                    <div class="footer">
                        <h3 class="footer-title">Liên hệ </h3>
                        <div class="social">
                            <img src="https://i.postimg.cc/44pPB9wk/facebook.png" alt="" />
                            <img src="https://i.postimg.cc/L8Q3nB4f/twitter.png" alt="" />
                            <img src="https://i.postimg.cc/TYG9S3Hy/instagram.png" alt="" />
                            <img src="https://i.postimg.cc/kGCxkTwr/youtube.png" alt="" />
                            <img src="https://i.postimg.cc/CKZHDBd2/telegram.png" alt="" />
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <div id="go-to-top">
        <i class='fa fa-caret-up'></i>
    </div>

</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/actions.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
    var c = 0;

    function menu() {
        if (c % 2 == 0) {
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";
            c++;
        } else {
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";
            c++;
        }
    }
</script>

</body>

</html>